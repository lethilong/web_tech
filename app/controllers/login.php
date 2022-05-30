<?php
Class Login extends Controller
{
    public function index()
    {
        $data['page-title'] = "Login";
        $this->view("login", $data);
    }
}