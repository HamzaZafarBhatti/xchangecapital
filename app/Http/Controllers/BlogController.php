<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'title' => 'required',
                'post_date' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png|max:1000'
            ],
            [
                'title.required' => 'Post Title Must not be empty',
                'post_date.required' => 'Post date must be selected',
            ]
        );

        // return $request;
        $in = $request->except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'post_' . time() . '.' . $image->getClientOriginalExtension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $in['image'] = $filename;
        }
        $res = Blog::create($in);
        if ($res) {
            return redirect()->route('admin.blogs.index')->with('success', 'Post was created Successfully!');
        } else {
            return back()->with('error', 'Problem creating post');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        // return $data;
        $request->validate(
            [
                'title' => 'required',
                'details' => 'required',
                'image' => 'nullable|mimes:jpeg,jpg,png|max:1000'
            ],
            [
                'title.required' => 'Post Title Must not be empty',
                'details.required' => 'Post Details  must not be empty',
            ]
        );


        $in = $request->except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'post_' . time() . '.' . $image->getClientOriginalExtension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/images/';
            File::delete($path . $blog->image);
            $in['image'] = $filename;
        }
        $res = $blog->update($in);

        if ($res) {
            return redirect()->route('admin.blogs.index')->with('success', 'Updated Successfully!');
        } else {
            return back()->with('error', 'Problem With Updating Article');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        $path = './asset/images/';
        File::delete($path . $blog->image);
        $res =  $blog->delete();
        if ($res) {
            return back()->with('success', 'Post Delete Successfully!');
        } else {
            return back()->with('alert', 'Problem With Deleting Post');
        }
    }

    public function unpublish($id)
    {
        $blog = Blog::find($id);
        $blog->update([
            'status' => 0
        ]);
        return back()->with('success', 'Article has been unpublished.');
    }
    public function publish($id)
    {
        $blog = Blog::find($id);
        $blog->update([
            'status' => 1
        ]);
        return back()->with('success', 'Article was successfully published.');
    }
}
