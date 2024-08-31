<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
	public function index(): string
	{
		helper('html');
		helper('form');
		
		$model = model(NewsModel::class);
		$data = [
			'news_list' => $model->getNews(),
			'title' => 'News Archive',
		];
		
		return view('templates/header', $data)
			. view('news/new')
			. view('news/index')
			. view('templates/footer');
	}
	
	public function show(?string $slug = null): string
	{
		helper('html');
		
		$model = model(NewsModel::class);
		
		$data['news'] = $model->getNews($slug);
		
		if ( $data['news'] === null ) {
			throw new PageNotFoundException('Cannot find the news item: ' . $slug);
		}
		
		$data['title'] = $data['news']['title'];
		
		return view('templates/header', $data)
			. view('news/view')
			. view('templates/footer');
	}
	
	public function new(): string
	{
		helper('form');
		
		$data['title'] = 'Create a news item';
		
		return view('templates/header', $data)
			. view('news/new')
			. view('templates/footer');
	}
	
	public function create(): string
	{
		helper('html');
		helper('form');
		
		$data = $this->request->getPost(['title','body']);
		if (! $this->validateData($data, [
			'title' => 'required|max_length[255]|min_length[3]',
			'body' => 'required|max_length[5000]|min_length[10]',
		])) {
			return $this->new();
		}
		
		$post = $this->validator->getValidated();
		
		$model = model(NewsModel::class);
		$model->save([
			'title' => $post['title'],
			'slug' => url_title($post['title'], '-', true),
			'body' => $post['body'],
		]);
				
		return view('templates/header', ['title' => 'Create a news item'])
			. view('news/success')
			. view('templates/footer');
	}
}
