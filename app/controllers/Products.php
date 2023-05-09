<?php

class Products extends Controller
{
	public function index()
	{
		echo "Products Controller";

		$this->view("products/products");
	}
}