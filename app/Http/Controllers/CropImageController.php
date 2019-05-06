<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $targ_w = $targ_h = 300;
        $jpeg_quality = 300;

        //$src = $_SERVER['DOCUMENT_ROOT'].$request->src;
        $src = public_path($request->src);
        $output_filename=$src;
        $informacion = getimagesize($src);
        $extension = $informacion["mime"];
        //echo $extension;
        switch ($extension) {
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($src);
                $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$request->x,$request->y,
                    $targ_w,$targ_h,$request->w,$request->h);
                imagejpeg($dst_r, $output_filename, $jpeg_quality);
                break;
            case 'image/jpg':
                $img_r = imagecreatefromjpeg($src);
                $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$request->x,$request->y,
                    $targ_w,$targ_h,$request->w,$request->h);
                imagejpeg($dst_r, $output_filename, $jpeg_quality);
                break;
            case 'image/png':
                $img_r = imagecreatefrompng($src);
                $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                imagesavealpha($dst_r, TRUE);
                $empty = imagecolorallocatealpha($dst_r,0x00,0x00,0x00,127);
                imagefill($dst_r, 0, 0, $empty);
                imagecopyresampled($dst_r,$img_r,0,0,$request->x,$request->y,
                    $targ_w,$targ_h,$request->w,$request->h);
                imagepng($dst_r, $output_filename);
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($src);
                $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$request->x,$request->y,
                $targ_w,$targ_h,$request->w,$request->h);
                imagegif($dst_r, $output_filename, $jpeg_quality);
                break;
        }
        /* if(strpos($extension, "jpg")|| strpos($extension, "jpeg"))
        {
            $img_r = imagecreatefromjpeg($src);
            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
            imagecopyresampled($dst_r,$img_r,0,0,$request->x,$request->y,
                $targ_w,$targ_h,$request->w,$request->h);
            imagejpeg($dst_r, $output_filename, $jpeg_quality);
            
        }

        if(strpos($extension, "png"))
        {
            $img_r = imagecreatefrompng($src);
            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
            imagesavealpha($dst_r, TRUE);
            $empty = imagecolorallocatealpha($dst_r,0x00,0x00,0x00,127);
            imagefill($dst_r, 0, 0, $empty);
            imagecopyresampled($dst_r,$img_r,0,0,$request->x,$request->y,
                $targ_w,$targ_h,$request->w,$request->h);
            imagepng($dst_r, $output_filename);
        }

        if(strpos($extension, "gif"))
        {
            $img_r = imagecreatefromgif($src);
            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
            imagecopyresampled($dst_r,$img_r,0,0,$request->x,$request->y,
                $targ_w,$targ_h,$request->w,$request->h);
            imagegif($dst_r, $output_filename, $jpeg_quality);
        } */


        return response()->json(array('success' => true));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
