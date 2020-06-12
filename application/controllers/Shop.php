<?php
class Shop extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('shop_model');
        }

        public function index()
        {
                $data['shop'] = $this->shop_model->get_shop();
                $data['title'] = 'SHOP';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/banner');
                $this->load->view('shop/index', $data);
                $this->load->view('templates/footer');
        }

        public function cart()
        {
                $data['cart'] = $this->shop_model->get_cart();
                $data['title'] = 'CART';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/banner');
                $this->load->view('shop/cart', $data);
                $this->load->view('templates/footer');
        }

        public function create()
        {
                $data['title'] = 'Add item';
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/banner');
                $this->load->view('shop/create', array('error' => ' '));
                $this->load->view('templates/footer');
        }

        public function do_upload()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Add item';

                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('price', 'Price', 'required');

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 10024;
                $config['max_height']           = 1068;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload() || !$this->form_validation->run()) {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/banner');
                        $this->load->view('shop/create', $error);
                        $this->load->view('templates/footer');
                } else {
                        $data = array('upload_data' => $this->upload->data());
                        $image = $_FILES['userfile']['name'];
                        $this->shop_model->get_create($image);
                        redirect('shop');
                }
        }

        public function delete()
        {
                $data['shop'] = $this->shop_model->get_shop();
                $data['title'] = 'Delete item';

                $this->load->view('templates/header');
                $this->load->view('templates/banner', $data);
                $this->load->view('shop/delete', $data);
                $this->load->view('templates/footer');
        }

        public function do_delete($id)
        {
                $this->shop_model->get_delete($id);
                redirect('shop/delete');
        }

        public function add()
        {
                $data = array(
                        'id'      => $this->input->post('id'),
                        'qty'     => 1,
                        'image'    => $this->input->post('image'),
                        'name'    => $this->input->post('name'),
                        'price'   => $this->input->post('price')
                );
                $this->cart->insert($data);

                redirect('shop');
        }

        public function remove($rowid)
        {
                $data = array(
                        'rowid' => $rowid,
                        'qty' => 0
                );
                $this->cart->update($data);

                redirect('shop/cart');
        }
}
