<?php

namespace App\Jobs;

use App\Http\Modules\InterestedEmails\Events\InterestedEmailsCreatedEvent;
use App\Models\InterestedEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $interestedEmail = InterestedEmail::create($this->data);
        event(new InterestedEmailsCreatedEvent($interestedEmail));
    }
}
