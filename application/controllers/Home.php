<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        //var_dump(base_url());
        $im = "http://localhost/posmini/assets/img";
        $p = FCPATH . "assets\img";
        //var_dump($p);
        $data = array(
            array(
                'nama' => 'Paket Desktop',
                'img'  => 'paket-desktop.png',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil nobis, ad dolores asperiores dolorem error accusantium saepe praesentium, minima magni dicta mollitia possimus odio quo, beatae eligendi quaerat repellendus quibusdam odit? Nam aliquid eaque ipsam ut unde, odio vero earum!
                '
            ),
            array(
                'nama' => 'Paket Advance',
                'img'  => 'paket-advance.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam culpa exercitationem ipsum. Numquam aut vitae libero tenetur, id unde repudiandae labore, quidem laborum in ratione. Tenetur eveniet quisquam temporibus corporis iste eaque recusandae cum dolore.'
            ),
            array(
                'nama' => 'Paket Lifestyle',
                'img'  => 'paket-lifestyle.png',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam praesentium expedita qui veritatis, repellat tempora, consequatur eos pariatur harum hic ipsam quasi. Debitis earum est expedita accusamus impedit magni quaerat aut? Temporibus sit molestias quasi, saepe minima deleniti sapiente hic.'
            ),
            array(
                'nama' => 'Standart Repo',
                'img'  => 'standard_repo.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam culpa exercitationem ipsum. Numquam aut vitae libero tenetur, id unde repudiandae labore, quidem laborum in ratione. Tenetur eveniet quisquam temporibus corporis iste eaque recusandae cum dolore.'
            )
        );
        return view('index', ['posts' => $data]);
    }
}