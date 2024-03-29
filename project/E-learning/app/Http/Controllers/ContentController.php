<?php

namespace App\Http\Controllers;

use App\Content;
use App\SubCategory;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

use DB;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
         $contentList = Content::with(['categories','sub_categories'])->get();
        // dd($contentList);
        return response()->json(['contentList'=>$contentList],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValidation($request);

        $file_url = '';
        if($request->file !='')
        {
            $uploadPath = public_path('uploads/');
            $fileName = $request->file->getClientOriginalName();
            $newFileName = time().'.'.$request->file->getClientOriginalExtension();
             $file_url = $newFileName;
            $request->file->move($uploadPath,$newFileName);

        }

        $content = new Content();
        $content->category_id = $request->category_id;
        $content->subCategory_id = $request->subCategory_id;
        $content->title = $request->title;
        $content->description = $request->description;
        $content->video_url = $request->video_url;
       
        $content->file = $file_url;
        $content->save();
        return ['status'=>'Success'];


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $contentById = Content::find($id);
        return response()->json(['contentById'=>$contentById],200);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content,$id)
    {
        $this->formValidation($request);

        $file_url = '';
        $content = Content::find($id);

        if($request->file !='')
        {
            $uploadPath = public_path('uploads/');
            $fileName = $request->file->getClientOriginalName();
            $newFileName = time().'.'.$request->file->getClientOriginalExtension();
             $file_url = $newFileName;
             $content->file = $file_url;
            $request->file->move($uploadPath,$newFileName);

        }

        $content->category_id = $request->category_id;
        $content->subCategory_id = $request->subCategory_id;
        $content->title = $request->title;
        $content->description = $request->description;
        $content->video_url = $request->video_url;
       
        $content->save();
        return ['status'=>'Success'];


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $getFile = Content::find($id);

        if($getFile->file != '')
        {
            $path = public_path('uploads/'.$getFile->file);
            //dd($path);
            unlink($path);
        }
    

        Content::destroy($id);
       return ['status'=>'success'];
    }

    public function getSubcategoryByCategoryId($id)
    {
         $subCategoryList = SubCategory::where('cat_id',$id)->get();
        return response()->json(['subCategoryList'=>$subCategoryList],200);
        

    }

      public function formValidation($request){
        $this->validate($request,
        [
            'category_id' => 'required',
            'subCategory_id' => 'required',
            'title' => 'required',


        ]);
    }

    public function categoryWiseContent(){

       
           $categoryWiseContent = DB::table('contents')
           ->join('categories','contents.category_id','=','categories.id')
           ->select('categories.cat_name', DB::raw('count(contents.id) as total'))
           ->where('contents.deleted_at', Null)
           ->groupBy('contents.category_id')
           ->get();
        return response()->json(['categoryWiseContent'=>$categoryWiseContent],200);

    }

     public function categoryWiseSubCategory(){

       
           $categoryWiseSubCategory = DB::table('contents')
           ->join('sub_categories','contents.subCategory_id','=','sub_categories.id')
           ->select('sub_categories.sub_cat_name', DB::raw('count(contents.id) as total'))
           ->where('contents.deleted_at', Null)
           ->groupBy('contents.subCategory_id')
           ->get();
        //    dd($categoryWiseSubCategory);
        return response()->json(['categoryWiseSubCategory'=>$categoryWiseSubCategory],200);

    }

    
}
