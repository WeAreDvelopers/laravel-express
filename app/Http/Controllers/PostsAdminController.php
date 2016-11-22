<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Tag;
use App\Http\Requests\PostRequest;

class PostsAdminController extends Controller
{
	private $post;
	public function __construct(Post $post){
		$this->post = $post;
	}

    public function index(){
    	$posts = $this->post->paginate(25);
 
    	return view("admin.posts.index",compact("posts"));
    }
    public function create(){
    	return view("admin.posts.create");
    }
    /* PostRequest -> intercepta os dados para maninupar/inserir no banco*/
    public function store(PostRequest $request){
     
    	$post = $this->post->create($request->all()); // grava no banco de dados
        $post->tags()->sync($this->getTagsIds($request->tags));//verifica se existe
    	return redirect()->route('admin.posts.index');
    }
    public function edit($id){
    	$post = $this->post->find($id);
    	return view("admin.posts.edit",compact('post'));
    }
    public function update($id, PostRequest $request){
    	$this->post->find($id)->update($request->all());
        $post = $this->post->find($id);
        $post->tags()->sync($this->getTagsIds($request->tags));//verifica se existe
    	return redirect()->route('admin.posts.index');
    }

    public function destroy($id){
    	$this->post->find($id)->delete();
    	return redirect()->route('admin.posts.index');
    }
    private function getTagsIds($tags){
        $tagLists = array_filter(array_map('trim',explode(",",$tags))); // varre o array e lima espaços em brancos
        $tagsIDs = [];
        foreach($tagLists as $tagName){
            $tagsIds[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }
        return $tagsIds;
    }
}
