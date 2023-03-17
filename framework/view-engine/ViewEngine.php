<?php

class ViewEngine
{
    private $view;
    private $data;

    public function setView($view)
    {
        $fileName =  __DIR__ . "/../../views/$view.php";
        $htmlFileName = __DIR__ . "/../../views/$view.html";
        if (!file_exists($fileName)) {
            if (!file_exists($htmlFileName)) {
                throw new Exception("View file not found");
            } else {
                $this->view = $htmlFileName;
                return $this;
            }
        }

        $this->view = $fileName;
        return $this;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function render()
    {
        ob_start();
        extract($this->data);
        require_once $this->view;
        $str = ob_get_contents();
        return $str;
    }
}
