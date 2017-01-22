<?php
namespace leophp;

class Attachment extends Controller {

  /**
   * 文件下载，图片显示
   * @param  [type] $file [description]
   * @return [type]       [description]
   */
  public function download($file=null) {

    $attachment = App::config()['attachment'];
    $file = $attachment['path'] . DIRECTORY_SEPARATOR . $_REQUEST['file'];
    if(!file_exists($file)) { return 404; }
    $fs = fopen($file, "r");
    Header("Content-type: application/octet-stream");
    Header("Accept-Ranges: bytes");
    Header("Accept-Length: ". filesize($file));
    Header("Content-Disposition: attachment; filename=" . $_REQUEST['file']);
    echo fread($fs, filesize($file));
    fclose($fs);

  }

  /**
   * 文件上传
   * @return [type] [description]
   */
  public function upload($file=null) {

    try {

      $attachment = App::config()['attachment'];
      $file = uniqid() . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
      $save = $attachment['path'] . DIRECTORY_SEPARATOR . $file;
      move_uploaded_file($_FILES['file']['tmp_name'], $save);

      return array(
        'name' => $_FILES["file"]["name"],
        'mime' => $_FILES["file"]["type"],
        'size' => $_FILES["file"]["size"],
        'hash' => md5_file($save),
        'file' => $file,
        'path' => $save,
        'time' => date('Y-m-d H:i:s'),
        'info' => $_REQUEST['info']
      );

    } catch (Exception $e) {
      return $e;
    }

  }

}
