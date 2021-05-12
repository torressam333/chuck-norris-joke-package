<?php

namespace Sam\Commands;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class Joke extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chuck-norris';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hopefully makes you smile throughout the day as a developer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws GuzzleException
     */
    public function handle()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://api.chucknorris.io/jokes/random', [
            'headers' => [
                'Accept' => 'text/plain'
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            $this->error('WHOOPS cannot contact the joke api. Have you tried turning off and back on?');
            return;
        }

        //Display actual joke
        $this->info( (string) $response->getBody());
    }
}
