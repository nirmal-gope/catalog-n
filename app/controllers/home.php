<?php

class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = "Photos";

        //Pagination
        $pagination = $this->loadModel("pagination");
        $data['page_next'] = $pagination->generate_link($pagination->current_page_number() + 1);
        $data['page_prev'] = $pagination->generate_link($pagination->current_page_number() - 1);
        $data['page_1'] = $pagination->generate_link(1);
        $data['page_2'] = $pagination->generate_link($pagination->current_page_number() + 1);
        $data['page_3'] = $pagination->generate_link($pagination->current_page_number() + 2);
        $data['page_4'] = $pagination->generate_link($pagination->current_page_number() + 3);
        $data['page_current'] = $pagination->current_page_number();

        $load_class = $this->loadModel("load_images");
        $data['page_total'] = $load_class->get_total();



        $find = isset($_GET["find"]) ? $_GET["find"] : "";
        $data["images"] = $load_class->get_images($find);

        $image_class = $this->loadModel("image_class");

        if (is_array($data["images"]))
        {
            foreach ($data["images"] as $key => $image) {
                $data["images"][$key]->image = $image_class->get_thumbnail($image->image);
            }
        }
        $this->view("catalog/index", $data);
    }
}
