<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('Produto');

		$produtos = $this->Produto->getProdutosPrincipais();
		$tipos = $this->Produto->getTipos();

		$this->template->load('templates/template', 'templates/homepage/homepage', [
			'produtos' => $produtos,
			'tipos' => $tipos
		]);
	}
}
