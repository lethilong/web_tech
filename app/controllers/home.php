<?php
Class Home extends Controller
{
    public function index()
    {
        $data['page-title'] = "Home";
        $this->view("index", $data);
    }
}