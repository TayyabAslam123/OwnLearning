<?php

namespace App\Observers;

use App\Blog;

class BlogObserver
{
    /**
     * Handle the blog "created" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function creating(Blog $blog)
    {
       
        $url = str_replace( ' ', '-', $blog->title);
        $blog->url = 'my-new-blog-'.$url;
  
    }

    /**
     * Handle the blog "updated" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function updating(Blog $blog)
    {
        dd('here');
        $url = str_replace( ' ', '-', $blog->title);
        $blog->url = 'blog-post-'.$url;
    }

    /**
     * Handle the blog "deleted" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function deleted(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "restored" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function restored(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "force deleted" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function forceDeleted(Blog $blog)
    {
        //
    }
}
