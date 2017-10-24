//unset($_SESSION['tentativas']);
//unset($_SESSION['msgip']);
//unset($_SESSION['IPATACK']);
$_SESSION['tentativas'] = $_SESSION['tentativas'] + 1;
if ($_SESSION['tentativas'] == 10) {
  function get_ip_address() {
    // check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // return unreliable ip since all else failed
    return $_SERVER['REMOTE_ADDR'];
    }
    $_SESSION['IPATACK'] = get_ip_address();
    $so = $_SESSION['so'];
    $navegador = $_SESSION['navegador'];
    $ipdb = $_SESSION['IPATACK'];
    unset($_SESSION['navegador']);
    unset($_SESSION['so']);

    $_SESSION['msgip'] = "<p style='margin: 10px; color: red;'>SEU IP FOI SALVADO EM NOSSO SERVIDOR POR QUESTOES DE SEGURANÇA !</p>";
    unset($_SESSION['tentativas']);

    $data = date ('d-m-Y H:i:s');
    $sql = "INSERT INTO IP (data, ip, so, navegador) VALUES ('$data', '$ipdb', '$so', '$navegador')";
    $result = mysqli_query($db,$sql);
}

mysqli_close($link);
