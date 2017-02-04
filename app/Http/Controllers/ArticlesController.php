<?php namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tags;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Auth;

//use Illuminate\Http\Request;
use Carbon\Carbon;
//use Request;

class ArticlesController extends Controller {

    
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth', ['only' => 'create']);
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
        
        //$article = Article::findOrFail($id);
        /*
        $slugs = Article::lists('title');
        
        foreach ($slugs as $slug) {
            
            $slug = str_slug($slugs, '-');
            
        }
        
        //$slug = str_slug($article, '-');
        
        return $slug;
        */
        return view('articles.index', compact('articles'));
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
        
        return view('articles.view', compact('article'));
    }
    
    /**
     * Create articles
     *
     * @return Response
     */
    public function create()
    {   
        $tags = Tags::lists('name', 'id');
        
        return view('articles.create', compact('tags'));
    }
    
    /**
     * Save our articles and redirect to articles page
     *
     * @param  ArticleRequest $request
     * @return Response
     */
    /*
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
        
        return redirect('articles')->with(['flash_message' => 'Your article has been created!']);
    }
    */
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
        
        return view('articles.edit', compact('article', 'tags'));
    }
    
    /**
     * Edit an article
     *
     * @param  integer $id
     * @return Response
     */
    /*
    public function update($id, ArticleRequest $request)
    {   
        $article = Article::findOrFail($id);
        
        $article->update($request->all());
        
        $article->tags()->sync($request->input('tag_list'));
        
        return redirect('articles');
    }
    */
}
