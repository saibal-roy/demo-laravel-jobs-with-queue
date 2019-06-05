<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $linked_images;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($linked_images)
    {
        // dump(1);
        $this->linked_images = $linked_images;
        // dd($this->linked_images);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->linked_images != null)
        {
            foreach ($this->linked_images as $key => $image) {
                Storage::putFile('images', $image);
            }
        }   

        
    }
}
