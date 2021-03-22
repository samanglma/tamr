<?php
class Order extends CI_Controller
{
    public $language = '';

    public function __construct()
    {
        parent::__construct();

        $this->language = lang() == 'arabic' ? 'ar' : 'en';

        if (!$this->session->userdata('user_id')) {

            redirect($this->language . '/login');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('user_id');
        $data['orders'] = $this->Order_m->getOrdersByUserId($id);
        $data['bodyClass'] = 'orders';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];
        $data['breadcrumb'] = [
            'Home' => base_url(),
            'Orders' => base_url($this->language . '/orders'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');

        $this->load->view('frontend/user/orders/index', $data);
    }


    public function details()
    {
        $id = $this->uri->segment('3');
        $data['bodyClass'] = 'order-details';
        $order_id = base64_decode($id);
        $data['order'] = $this->Order_m->getOrdeById($order_id);
        $data['orderItems'] = $this->OrderItems_m->getProducts($order_id);
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];
        $data['breadcrumb'] = [
            'Home' => base_url(),
            'Orders' => base_url($this->language . '/orders'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');

        $this->load->view('frontend/user/orders/details', $data);
    }

    public function track($id)
    {

        $order_id = base64_decode($id);
        $data['bodyClass'] = 'order-tracking';
        $lang = $this->uri->segment(1) == 'ar' ? 'ar' : 'en';
        if ($this->input->post()) {
            $data['order_id'] = $order_id;
            $data['comments'] = $this->input->post('comments');
            $data['points'] = $this->input->post('rating');
            $this->common_model->save('order_reviews', $data);
            if (lang() == 'arabic') {
                $this->session->set_flashdata('success', '<span class="alert alert-success">نشكرك على إبداء رأيك القيِّم</span>');
                redirect("ar/order/track/" . $order_id);
            } else {
                $this->session->set_flashdata('success', '<span class="alert alert-success">Thank you for your valuable feedback</span>');
                redirect("en/order/track/" . $order_id);
            }
        }
        $data['bodyClass'] = 'cart';
        $data['orderNumber'] = $this->uri->segment(3);
        $data['socialLinks'] = $this->Social_m->getAllSocials();
        $data['topSellers'] = $this->products_m->getTopSellers();
        $data['info'] = $this->info_m->getInfoForHome();
        $data['order'] = $this->Order_m->getStatus($order_id);
        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/track-order', $data);
        $this->load->view('frontend/includes/footer');
    }


    public function apply_promocode()
    {

        die();

        if ($this->input->post()) {
            $data['code'] = $this->input->post('p_code');
            $data['billing_email'] = $this->input->post('billing_email');
            $p = $this->Order_m->applyPromoCode($data['code'], $data['billing_email']);
            if ($p == 'invalid') {
                if (lang() == 'arabic') {
                    echo json_encode(['success' => 'false', 'message' => '<span class="alert alert-danger">هذا الرَّمز التَّرويجيّ غير صحيح</span><br><br>']);
                } else {
                    echo json_encode(['success' => 'false', 'message' => '<span class="alert alert-danger">Promo Code is invalid</span><br><br>']);
                }
                exit;
            } else if ($p == 'already-used') {
                if (lang() == 'arabic') {
                    echo json_encode(['success' => 'false', 'message' => '<span class="alert alert-danger">   لقد تمَّ اِستخدام هذا الرَّمز التَّرويجيّ سابقاً</span><br><br>']);
                } else {
                    echo json_encode(['success' => 'false', 'message' => '<span class="alert alert-danger">you have already used this code</span><br><br>']);
                }
                exit;
            } else if ($p == 'out-of-used') {
                if (lang() == 'arabic') {
                    echo json_encode(['success' => 'false', 'message' => '<span class="alert alert-danger">هذا الرَّمز التَّرويجيّ مُنتهي الصلاحيَّة</span><br><br>']);
                } else {
                    echo json_encode(['success' => 'false', 'message' => '<span class="alert alert-danger">Promo Code is expired</span><br><br>']);
                }
                exit;
            } else {
                $this->session->set_userdata('promo', $p['id']);
                $this->session->set_userdata('discount', $p['discount']);
                echo json_encode(['success' => 'true', 'message' => $p['discount']]);
                exit;
            }
        }
    }

    public  function getCityBySate($state_id)
    {
        $data = $this->db->get_where('city', ['state_id' => $state_id])->result();
        echo json_encode($data);

        exit;
    }
}
