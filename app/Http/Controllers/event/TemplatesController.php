<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Template;
use App\TemplateKeyword;
use App\TemplateImage;
use App\CatergoryTemplate;

class TemplatesController extends Controller
{

    public function admin_index()
    {
        //This returns all templates from DB to Template Management of AdminDash
        $templates = Template::all();
        return view('admin.event.template')->with('templates',$templates);
        
    }


    public function admin_create()
    {
        return view('admin.event.template_create');
    }


    public function admin_store(Request $request)
    {
        //Validating submited details
        $this->validate($request, [
            'name'=> 'required',
            'description'=> 'required',
            'keywords'=> 'required',
            'catergories'=> 'required',
            'template_images'=>'nullable|max:1999'
        ]);

        //Checking Whether files are images
        if($request->hasFile('template_images'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('template_images');
            foreach($images as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check)
                {
                    return redirect()->back()->with('error','Please Upload Image File(s)');
                }
            }
        }

        //Storing an template in DB by admin
        $template = new Template();
        $template->name =  $request->name;
        $template->description =  $request->description;
        $template->save();
        //Getting keywords to an array
        $keywords = explode(" ",$request->keywords);

        foreach($keywords as $keyword)
        {
            //Saving each keyword with template_id
            $templateKeyword = new TemplateKeyword();
            $templateKeyword->template_id = $template->template_id;
            $templateKeyword->keyword = $keyword;
            $templateKeyword->save();
        }

        //Saving catergory_template data
        foreach($request->catergories as $catergory)
        {
            $catergoryTemplate = new CatergoryTemplate();
            $catergoryTemplate->catergory_id = $catergory;
            $catergoryTemplate->template_id = $template->template_id;
            $catergoryTemplate->save();
        }

        //Saving images
        if($request->hasFile('template_images'))
        {
            $images = $request->file('template_images');
            foreach($images as $image)
            {
                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload 
                $image_up = $image;
                $image_resize = Image::make($image->getRealPath());              
                $image_resize->resize(265, 350);
                $image_resize->save(public_path('storage/images/template/' .$fileNameToStore));
                
                //Adding URL to template_images table
                $template_image = new TemplateImage();
                $template_image->template_id = $template->template_id;
                $template_image->imgurl = $fileNameToStore;
                $template_image->save();
                
            }
        }
        //On success go and add tasks
        return redirect('/admin/task/add/'.$template->template_id)->with('success','Please Add Task(s) For The Template');
    }
    public function block($id)
    {
        $template = Template::where('template_id',$id)->get();
        $template = $template[0];
        if ($template->istemp!=2)
        {
            $template->istemp=2;
        }
        else
        {
            $template->istemp=1;
        }
        $template->save();
        return redirect('/admin/template');
    }


    public function show($id)
    {
        //
    }


    public function admin_edit($id)
    {
        $template = (Template::where('template_id',$id)->get())[0];
        $templateKeywords=TemplateKeyword::where('template_id',$id)->get();
        $catergoryTemplates=CatergoryTemplate::where('template_id',$id)->get();
        return view('admin.event.template_update')->with('template',$template)->with('templateKeywords',$templateKeywords)->with('catergoryTemplates',$catergoryTemplates);
        //return view('test')->with('template',$template)->with('catergoryTemplate',$catergoryTemplate);
        //return ($templateKeyword);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {   
        $tempImages=TemplateImage::where('template_id',$id)->get();
        if(($tempImages->count())>0)
        {
            foreach($tempImages as $tempImage)
            {
                Storage::delete('public/images/template/'.$tempImage->imgurl);
            }
        }
        Template::where('template_id',$id)->delete();        
        return redirect('/admin/template');
        
    }


}//end of class