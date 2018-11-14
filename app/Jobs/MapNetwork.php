<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MapNetwork implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hosts = $this->getAvailableHosts();

        dd($hosts);
    }

    /**
     * Determine what hosts are available on the network.
     *
     * @return \Illuminate\Support\Collection
     */
    private function getAvailableHosts()
    {
        $scan = shell_exec('sudo $(which nmap) -sn ' . config('home.targets'));
        $collection = collect(explode(PHP_EOL, $scan));

        return $collection->filter(function ($value) {
            return str_contains($value, 'MAC Address');
        })->transform(function ($host) {
            preg_match('/: (.*?) \(/', $host, $macAddress);
            preg_match('/\((.*)\)/', $host, $vendor);

            return [
                'macAddress' => $macAddress[1],
                'vendor'     => $vendor[1],
            ];
        })->unique('macAddress');
    }
}
