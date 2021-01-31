<?php namespace App\Controllers;

use App\Models\AlbumModel;

class Album extends BaseController
{
	public function index()
	{
		$ga = new AlbumModel();
		$result = $albumModel->find();
		
		$parse = \Config\Services::parser();
		echo $parse->setData(['albums'=>$result,'base_url'=>base_url()])->render('inicio');
		
	}
	
	public function new()
	{
	$parse = \Config\Services::parser();
	$data['titulo']='New Album';
	$data['base_url'] = base_url();
	echo $parse->setData($data)
				->render('nuevo');
	}
	
	public function save(){
		if ($this->request->getMethod() === 'post' &&
			$this->validate(['name'=> 'required|min_length[3]|max_length[255]',
			$this->validate(['autor'=> 'required|min_length[3]|max_length[255]',
			$this->validate(['genre_id'=> 'required|min_length[3]|max_length[255]',])
			)
		{
		$name = $this->request->getPost('name');
		$autor = $this->request->getPost('autor');
		$genre_id = $this->request->getPost('genre_id');
		$ga = new AlbumModel();
		$ga->save(['name'=>$name],['autor'=>$name],['genre_id'=>$name])
		$this->response->redirect('index');
		}else{
			echo'Verifique datos';
		}
		
	}
	
	public function edit($id){
		
		$ga = new AlbumModel();
		$gr = $ga->find($id);
		$name = $gr->name;
		$autor = $gr->autor;
		$genre_id = $gr->genre_id;
		
		$parse = \Config\Services::parser();
		echo $parse->setData(['titulo'=>'Edit Album','id'=>$id,'name'=>$name,'autor'=>autor,,'genre_id'=>genre_id 'base_url'=>base_url()])
					->render('edit');
	}
	
	public function update(){
		if ($this->request->getMethod() === 'post' &&
			$this->validate(['name'=> 'required|min_length[3]|max_length[255]',
			$this->validate(['autor'=> 'required|min_length[3]|max_length[255]',
							'id'=>'required|integer'])
			)
		{
		$id = $this->request->getPost('id');
		$name = $this->request->getPost('name');
		$autor = $this->request->getPost('autor');
		
		$ga = new AlbumModel();
		$ga->update($id,['name'=>$name,['autor'=>$autor,]);
		$this->response->redirect(base_url().'/disco/public/album');
		}else{
			echo'Verifique datos';
		}
		
	}
	
	public function delete($id){
		$ga =  new AlbumModel();
		$ga->delete($id);
		
		$this->response->redirect(base_url().'/disco/public/album');
		
	}
	
	public function albumjs()
	{
		if($this->request->isAjax())
		{
			$ga = new AlbumModel();
			$result = $albumModel->find();
			return json_encode(["data"=>$result]);
		}else{
			$this->response->redirect(base_url().'/disco/public/album');
		}
	}
}