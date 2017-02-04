<?php namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Tags;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;
//use Request;

class ArticlesController extends Controller {

    
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('auth', ['only' => 'create']);
    }
    
    
    /**
     * Show all articles
     *
     * @return Response
     */
	public function index() 
    {
        //$articles = Article::all();
        $articles = Article::latest('published_at')->published()->get(); // Show the latest first that are published now
        //$articles = Article::latest('published_at')->Unpublished()->get(); // Show the latest unpublished posts for the future
        
        //return $articles;
        return view('admin.articles.index', compact('articles'));
    }
    
    /**
     * Show a single specific article
     *
     * @param  integer $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        
        return view('admin.articles.view', compact('article'));
    }
    
    /**
     * Create articles
     *
     * @return Response
     */
    public function create()
    {   
        $tags = Tags::lists('name', 'id');
        
        return view('admin.articles.create', compact('tags'));
    }
    
    /**
     * Save our articles and redirect to articles page
     *
     * @param  ArticleRequest $request
     * @return Response
     */
    
    public function store(ArticleRequest $request)
    {   
        //$input = Request::all();
        //$input['published_at'] = Carbon::now();
        //$input = Request::get('title');
        
        //$article = new Article;
        //$article->title = $input['title'];
        
        //Article::create($input);
        
        //$article = new Article($request->all());
        //Auth::user()->articles()->save($article);
        
        $article = Auth::user()->articles()->create($request->all());
        
        //\Session::flash('flash_message', 'Your article has been created!');
        
        //Article::create($request->all());
        
        //return $input;
        
        $article->tags()->attach($request->input('tag_list'));
        
        return redirect('admin/articles')->with(['flash_message' => 'Your article has been created!']);
    }
    
    /**
     * Edit an article
     *
     * @param  integer $id
     * @return Response
     */
    
    public function edit($id)
    {   
        $article = Article::findOrFail($id);
        $tags = Tags::lists('name', 'id');
        
        return view('admin.articles.edit', compact('article', 'tags'));
    }
    
    /**
     * Edit an article
     *
     * @param  integer $id
     * @return Response
     */
    
    public function update($id, ArticleRequest $request)
    {   
        $article = Article::findOrFail($id);
        
        $article->update($request->all());
        
        $article->tags()->sync($request->input('tag_list'));
        
        return redirect('admin/articles');
    }
    
    public function destroy($id)
    {   
        $article = Article::find($id);
        //$tags = Tags::lists('name', 'id');
        
        $article->delete();
        
        return redirect('admin/articles');
        
        //return view('admin.articles.edit', compact('article'));
    }
    
    // http://www.paulfp.uk/blog/2010/10/how-to-add-and-upload-an-image-using-ckeditor/
    public function uploadCKEditor(Request $request)
	{
		$url = 'images/uploads/'.time()."_".$_FILES['upload']['name'];

 //extensive suitability check before doing anything with the file…
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
    {
       $message = "No file uploaded.";
    }
    else if ($_FILES['upload']["size"] == 0)
    {
       $message = "The file is of zero length.";
    }
    else if (($_FILES["upload"]["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
    {
       $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
    }
    else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
    {
       $message = "You may be attempting to hack our server. We’re on to you; expect a knock on the door sometime soon.";
    }
    else {
      $message = "";
      $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
      if(!$move)
      {
         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
      }
      $url = "/" . $url;
    }
$funcNum = $_GET['CKEditorFuncNum'] ;
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
	}

}
