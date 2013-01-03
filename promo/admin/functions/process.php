<?PHP
class LICENSE
{
    private $_license_variables = array();
    private $_error = false;
    public function __call($OOO000O0O00OO00O000000OOO00OO0O, $OO0OO00O0OO000OO00OO0O0O0O0OOO0)
    {
        switch ($OOO000O0O00OO00O000000OOO00OO0O) {
            case base64_decode('R2V0RWRpdGlvbg=='):
                return self::issetfor($this->_license_variables["\x65\x64\x69\x74\x69\x6f\x6e"], '');
                break;
            case base64_decode('R2V0VXNlcnM='):
                return self::issetfor($this->_license_variables["\x75\x73\x65\x72\x73"], 0);
                break;
            case base64_decode('R2V0RG9tYWlu'):
                return self::issetfor($this->_license_variables["\x64\x6f\x6d\x61\x69\x6e"], '');
                break;
            case "\x47\x65\x74\x45\x78\x70\x69\x72\x65\x73":
                return self::issetfor($this->_license_variables["\x65\x78\x70\x69\x72\x65\x73"], "\x30\x31\x2e\x30\x31\x2e\x32\x30\x30\x30");
                break;
            case base64_decode('R2V0TGlzdHM='):
                return self::issetfor($this->_license_variables[base64_decode('bGlzdHM=')], 0);
                break;
            case base64_decode('R2V0U3Vic2NyaWJlcnM='):
                return self::issetfor($this->_license_variables["\x73\x75\x62\x73\x63\x72\x69\x62\x65\x72\x73"], 0);
                break;
            case "\x47\x65\x74\x56\x65\x72\x73\x69\x6f\x6e":
                return self::issetfor($this->_license_variables["\x76\x65\x72\x73\x69\x6f\x6e"], '');
                break;
            case "\x47\x65\x74\x4e\x46\x52":
                return self::issetfor($this->_license_variables[base64_decode('bmZy')], true);
                break;
            case base64_decode('R2V0QWdlbmN5SUQ='):
                return self::issetfor($this->_license_variables["\x61\x67\x65\x6e\x63\x79\x69\x64"], 0);
                break;
            case "\x47\x65\x74\x54\x72\x69\x61\x6c\x41\x63\x63\x6f\x75\x6e\x74\x4c\x69\x6d\x69\x74":
                return self::issetfor($this->_license_variables[base64_decode('dHJpYWxhY2NvdW50')], 0);
                break;
            case "\x47\x65\x74\x54\x72\x69\x61\x6c\x41\x63\x63\x6f\x75\x6e\x74\x45\x6d\x61\x69\x6c":
                return self::issetfor($this->_license_variables["\x74\x72\x69\x61\x6c\x65\x6d\x61\x69\x6c"], 0);
                break;
            case base64_decode('R2V0VHJpYWxBY2NvdW50RGF5cw=='):
                return self::issetfor($this->_license_variables["\x74\x72\x69\x61\x6c\x64\x61\x79\x73"], 0);
                break;
            case "\x47\x65\x74\x50\x69\x6e\x67\x62\x61\x63\x6b\x44\x61\x79\x73":
                return self::issetfor($this->_license_variables[base64_decode('cGluZ2JhY2tkYXlz')], -1);
                break;
            case "\x47\x65\x74\x50\x69\x6e\x67\x62\x61\x63\x6b\x47\x72\x61\x63\x65":
                return self::issetfor($this->_license_variables["\x70\x69\x6e\x67\x62\x61\x63\x6b\x67\x72\x61\x63\x65"], 0);
                break;
            default:
                return false;
                break;
        }
    }
    public function GetError()
    {
        return $this->_error;
    }
    public function DecryptKey($OOO00000OO0O0000OO000O00OO0O0OO)
    {
       
        $this->_license_variables        = array(
            'users' => 1000000000,
            "lists" => 1000000000,
            'subscribers' => 1000000000,
            'domain' => 'localhost',
            "expires" => 0,
            "edition" => 'Nulled By LeetWolf - Bad Syntax',
            'version' => 0,
            "nfr" => 0,
            "agencyid" => 0,
            'trialaccount' => 0,
            'trialemail' => 0,
            'trialdays' => 0,
            'pingbackdays' => '-1',
            "pingbackgrace" => 0
        );
    }
    static private function issetfor(&$O00OOOO0OOO0OOO000O000O0OO00O00, $OOOOOO0OO00OO00O0O0O000OOO00000 = false)
    {
        return isset($O00OOOO0OOO0OOO000O000O0OO00O00) ? $O00OOOO0OOO0OOO000O000O0OO00O00 : $OOOOOO0OO00OO00O0O0O000OOO00000;
    }
}

  
function ss9024kwehbehb(User_API &$OO0O00OOO00O0O0O000000OO0OOOOOO)
{
    ss9O24kwehbehb();
    if (!constant("\x49\x45\x4d\x5f\x53\x59\x53\x54\x45\x4d\x5f\x41\x43\x54\x49\x56\x45")) {
        return false;
    }
    if ($OO0O00OOO00O0O0O000000OO0OOOOOO->trialuser == base64_decode('MQ==')) {
        $OO00O0000OO0O00OOO000OO00OOO000            = get_agency_license_variables();
        $OO0O00OOO00O0O0O000000OO0OOOOOO->admintype = "\x63";
        if ($OO0O00OOO00O0O0O000000OO0OOOOOO->group->limit_totalemailslimit > $OO00O0000OO0O00OOO000OO00OOO000["\x74\x72\x69\x61\x6c\x5f\x65\x6d\x61\x69\x6c\x5f\x6c\x69\x6d\x69\x74"]) {
            $OO0O00OOO00O0O0O000000OO0OOOOOO->group->limit_totalemailslimit = (int) $OO00O0000OO0O00OOO000OO00OOO000[base64_decode('dHJpYWxfZW1haWxfbGltaXQ=')];
        }
        $OO0O00OOO00O0O0O000000OO0OOOOOO->group->limit_emailspermonth = 0;
        if (array_key_exists(base64_decode('c3lzdGVt'), $OO0O00OOO00O0O0O000000OO0OOOOOO->permissions)) {
            unset($OO0O00OOO00O0O0O000000OO0OOOOOO->permissions["\x73\x79\x73\x74\x65\x6d"]);
        }
    }
    if (!empty($OO0O00OOO00O0O0O000000OO0OOOOOO->userid)) {
        return true;
    }
    $O00O000OO00OOOO000OOOO00O00O0OO = get_available_user_count();
    if ($OO0O00OOO00O0O0O000000OO0OOOOOO->trialuser == "\x31" && ($O00O000OO00OOOO000OOOO00O00O0OO[base64_decode('dHJpYWw=')] === true || $O00O000OO00OOOO000OOOO00O00O0OO["\x74\x72\x69\x61\x6c"] > 0)) {
        return true;
    } elseif ($OO0O00OOO00O0O0O000000OO0OOOOOO->trialuser != "\x31" && ($O00O000OO00OOOO000OOOO00O00O0OO[base64_decode('bm9ybWFs')] === true || $O00O000OO00OOOO000OOOO00O00O0OO["\x6e\x6f\x72\x6d\x61\x6c"] > 0)) {
        return true;
    }
    return false;
}
function get_agency_license_variables()
{
    $OOO000OOO000OOOOO00OOOO0O0OO0O0 = ss02k31nnb(constant("\x53\x45\x4e\x44\x53\x54\x55\x44\x49\x4f\x5f\x4c\x49\x43\x45\x4e\x53\x45\x4b\x45\x59"));
    if (!$OOO000OOO000OOOOO00OOOO0O0OO0O0) {
        return array(
            "\x61\x67\x65\x6e\x63\x79\x69\x64" => 0,
            "\x74\x72\x69\x61\x6c\x5f\x61\x63\x63\x6f\x75\x6e\x74" => 0,
            base64_decode('dHJpYWxfZW1haWxfbGltaXQ=') => 0,
            "\x74\x72\x69\x61\x6c\x5f\x64\x61\x79\x73" => 0
        );
    }
    return array(
        "\x61\x67\x65\x6e\x63\x79\x69\x64" => $OOO000OOO000OOOOO00OOOO0O0OO0O0->GetAgencyID(),
        "\x74\x72\x69\x61\x6c\x5f\x61\x63\x63\x6f\x75\x6e\x74" => $OOO000OOO000OOOOO00OOOO0O0OO0O0->GetTrialAccountLimit(),
        base64_decode('dHJpYWxfZW1haWxfbGltaXQ=') => $OOO000OOO000OOOOO00OOOO0O0OO0O0->GetTrialAccountEmail(),
        "\x74\x72\x69\x61\x6c\x5f\x64\x61\x79\x73" => $OOO000OOO000OOOOO00OOOO0O0OO0O0->GetTrialAccountDays()
    );
}
function get_available_user_count()
{
    $O0000OOO00000000O00OO000O0O00OO = array(
        "\x6e\x6f\x72\x6d\x61\x6c" => 0,
        base64_decode('dHJpYWw=') => 0
    );
    $OO00O0000OOO00O0000OO0O00O00OO0 = ss02k31nnb(constant("\x53\x45\x4e\x44\x53\x54\x55\x44\x49\x4f\x5f\x4c\x49\x43\x45\x4e\x53\x45\x4b\x45\x59"));
    if (!$OO00O0000OOO00O0000OO0O00O00OO0) {
        return $O0000OOO00000000O00OO000O0O00OO;
    }
    $OO0000O0O000O000OO0000000OOO000 = get_current_user_count();
    $O00000OOO0OO0OOOOO00O00O0OO0OOO = "\x47\x65\x74\x55\x73\x65\x72\x73";
    $O0OOO0000O00OOOO00000OOOO0O00OO = "\x47\x65\x74\x54\x72\x69\x61\x6c\x41\x63\x63\x6f\x75\x6e\x74\x4c\x69\x6d\x69\x74";
    $O0OOO0OO0OOOO00OO0OOO00O0OO0O0O = intval($OO00O0000OOO00O0000OO0O00O00OO0->{$O00000OOO0OO0OOOOO00O00O0OO0OOO}());
    $OO000OO0O000OOOOO00OO0O0O0OO0OO = intval($OO00O0000OOO00O0000OO0O00O00OO0->{$O0OOO0000O00OOOO00000OOOO0O00OO}());
    $O0000OOO00000000O00OO000O0O00OO = array(
        "\x6e\x6f\x72\x6d\x61\x6c" => $O0OOO0OO0OOOO00OO0OOO00O0OO0O0O - $OO0000O0O000O000OO0000000OOO000["\x6e\x6f\x72\x6d\x61\x6c"],
        base64_decode('dHJpYWw=') => $OO000OO0O000OOOOO00OO0O0O0OO0OO - $OO0000O0O000O000OO0000000OOO000["\x74\x72\x69\x61\x6c"]
    );
    if ($O0000OOO00000000O00OO000O0O00OO["\x6e\x6f\x72\x6d\x61\x6c"] < 0 || $O0000OOO00000000O00OO000O0O00OO["\x74\x72\x69\x61\x6c"] < 0) {
        $O0000OOO00000000O00OO000O0O00OO = array(
            base64_decode('bm9ybWFs') => 0,
            "\x74\x72\x69\x61\x6c" => 0
        );
    }
    return $O0000OOO00000000O00OO000O0O00OO;
}
function get_current_user_count()
{
    $OOOO0OOO0O000O0OOOO00O00O00OOO0 = IEM::getDatabase();
    $O0OO00O0000000O0OO0000OO0OOO00O = $OOOO0OOO0O000O0OOOO00O00O00OOO0->Query("\x53\x45\x4c\x45\x43\x54\x20\x43\x4f\x55\x4e\x54\x28\x31\x29\x20\x41\x53\x20\x63\x6f\x75\x6e\x74\x2c\x20\x74\x72\x69\x61\x6c\x75\x73\x65\x72\x20\x46\x52\x4f\x4d\x20\x5b\x7c\x50\x52\x45\x46\x49\x58\x7c\x5d\x75\x73\x65\x72\x73\x20\x47\x52\x4f\x55\x50\x20\x42\x59\x20\x74\x72\x69\x61\x6c\x75\x73\x65\x72");
    if (!$O0OO00O0000000O0OO0000OO0OOO00O) {
        return false;
    }
    $O0O00000O00OOOOOO00OO00OOO0O000 = array(
        "\x74\x72\x69\x61\x6c" => 0,
        "\x6e\x6f\x72\x6d\x61\x6c" => 0
    );
    while ($O0OO000OOO0OOOO00OOOOO0OO000OO0 = $OOOO0OOO0O000O0OOOO00O00O00OOO0->Fetch($O0OO00O0000000O0OO0000OO0OOO00O)) {
        if ($O0OO000OOO0OOOO00OOOOO0OO000OO0[base64_decode('dHJpYWx1c2Vy')] == base64_decode('MQ==')) {
            $O0O00000O00OOOOOO00OO00OOO0O000[base64_decode('dHJpYWw=')] += intval($O0OO000OOO0OOOO00OOOOO0OO000OO0["\x63\x6f\x75\x6e\x74"]);
        } else {
            $O0O00000O00OOOOOO00OO00OOO0O000[base64_decode('bm9ybWFs')] += intval($O0OO000OOO0OOOO00OOOOO0OO000OO0["\x63\x6f\x75\x6e\x74"]);
        }
    }
    $OOOO0OOO0O000O0OOOO00O00O00OOO0->FreeResult($O0OO00O0000000O0OO0000OO0OOO00O);
    return $O0O00000O00OOOOOO00OO00OOO0O000;
}
function ssk23twgezm2()
{
	//die('test');
  //  ss9O24kwehbehb();
    $O0O000O000000O0O0O00OOOOO00O00O = ss02k31nnb(constant("\x53\x45\x4e\x44\x53\x54\x55\x44\x49\x4f\x5f\x4c\x49\x43\x45\x4e\x53\x45\x4b\x45\x59"));
    if (!$O0O000O000000O0O0O00OOOOO00O00O) {
        return false;
    }
    $OO0O0000000OOOOO0OOOO0OOO00O0O0 = $O0O000O000000O0O0O00OOOOO00O00O->GetAgencyID();
    $OOO0OO0O0OO000O000OOOOO0OO000OO = intval($O0O000O000000O0O0O00OOOOO00O00O->GetUsers());
    $OO00O00OO0O0O0OO0OO0OO00O0O000O = (empty($OO0O0000000OOOOO0OOOO0OOO00O0O0) ? 0 : intval($O0O000O000000O0O0O00OOOOO00O00O->GetTrialAccountLimit()));
    $OOO00O0O0000OO000O00O0O00O0000O = 0;
    $O00O0O0O0O0OOOOO00OO00OOO0OO0O0 = 0;
    $O0O0O0OOO00OOOO0OO000OO00O000OO = 0;
    $O0O0OO0O00OO0OOOOO000OOOO0000OO = 0;
    $OO0O0O000O0000O0OOO0OO0OOOO000O = IEM::getDatabase();
    $OO00O0O000OO000000OO00OO0000000 = array(
        base64_decode('c3RhdHVz') => false,
        base64_decode('bWVzc2FnZQ==') => false
    );
    $O00000000OOO00000O0OOO00000O0O0 = $OO0O0O000O0000O0OOO0OO0OOOO000O->Query("\x53\x45\x4c\x45\x43\x54\x20\x43\x4f\x55\x4e\x54\x28\x31\x29\x20\x41\x53\x20\x63\x6f\x75\x6e\x74\x2c\x20\x74\x72\x69\x61\x6c\x75\x73\x65\x72\x20\x46\x52\x4f\x4d\x20\x5b\x7c\x50\x52\x45\x46\x49\x58\x7c\x5d\x75\x73\x65\x72\x73\x20\x47\x52\x4f\x55\x50\x20\x42\x59\x20\x74\x72\x69\x61\x6c\x75\x73\x65\x72");
    if (!$O00000000OOO00000O0OOO00000O0O0) {
        $O00000000OOO00000O0OOO00000O0O0 = $OO0O0O000O0000O0OOO0OO0OOOO000O->Query("\x53\x45\x4c\x45\x43\x54\x20\x43\x4f\x55\x4e\x54\x28\x31\x29\x20\x41\x53\x20\x63\x6f\x75\x6e\x74\x2c\x20\x30\x20\x41\x53\x20\x74\x72\x69\x61\x6c\x75\x73\x65\x72\x20\x46\x52\x4f\x4d\x20\x5b\x7c\x50\x52\x45\x46\x49\x58\x7c\x5d\x75\x73\x65\x72\x73");
        if (!$O00000000OOO00000O0OOO00000O0O0) {
            return false;
        }
    }
    while ($O00OO0OOOOO0OO0O0OOO00000OOO000 = $OO0O0O000O0000O0OOO0OO0OOOO000O->Fetch($O00000000OOO00000O0OOO00000O0O0)) {
        if ($O00OO0OOOOO0OO0O0OOO00000OOO000["\x74\x72\x69\x61\x6c\x75\x73\x65\x72"]) {
            $O00O0O0O0O0OOOOO00OO00OOO0OO0O0 += intval($O00OO0OOOOO0OO0O0OOO00000OOO000["\x63\x6f\x75\x6e\x74"]);
        } else {
            $OOO00O0O0000OO000O00O0O00O0000O += intval($O00OO0OOOOO0OO0O0OOO00000OOO000[base64_decode('Y291bnQ=')]);
        }
    }
    $OO0O0O000O0000O0OOO0OO0OOOO000O->FreeResult($O00000000OOO00000O0OOO00000O0O0);
    $O0O0O0OOO00OOOO0OO000OO00O000OO = $OOO0OO0O0OO000O000OOOOO0OO000OO - $OOO00O0O0000OO000O00O0O00O0000O;
    $O0O0OO0O00OO0OOOOO000OOOO0000OO = $OO00O00OO0O0O0OO0OO0OO00O0O000O - $O00O0O0O0O0OOOOO00OO00OOO0OO0O0;
    if ($O0O0O0OOO00OOOO0OO000OO00O000OO < 0 || $O0O0OO0O00OO0OOOOO000OOOO0000OO < 0) {
        $OO00O0O000OO000000OO00OO0000000["\x6d\x65\x73\x73\x61\x67\x65"] = GetLang("\x55\x73\x65\x72\x4c\x69\x6d\x69\x74\x52\x65\x61\x63\x68\x65\x64", "\x59\x6f\x75\x20\x68\x61\x76\x65\x20\x72\x65\x61\x63\x68\x65\x64\x20\x79\x6f\x75\x72\x20\x6d\x61\x78\x69\x6d\x75\x6d\x20\x6e\x75\x6d\x62\x65\x72\x20\x6f\x66\x20\x75\x73\x65\x72\x73\x20\x61\x6e\x64\x20\x63\x61\x6e\x6e\x6f\x74\x20\x63\x72\x65\x61\x74\x65\x20\x61\x6e\x79\x20\x6d\x6f\x72\x65\x2e");
        return $OO00O0O000OO000000OO00OO0000000;
    }
    if ($O0O0O0OOO00OOOO0OO000OO00O000OO == 0 && $O0O0OO0O00OO0OOOOO000OOOO0000OO == 0) {
        $OO00O0O000OO000000OO00OO0000000["\x6d\x65\x73\x73\x61\x67\x65"] = GetLang("\x55\x73\x65\x72\x4c\x69\x6d\x69\x74\x52\x65\x61\x63\x68\x65\x64", "\x59\x6f\x75\x20\x68\x61\x76\x65\x20\x72\x65\x61\x63\x68\x65\x64\x20\x79\x6f\x75\x72\x20\x6d\x61\x78\x69\x6d\x75\x6d\x20\x6e\x75\x6d\x62\x65\x72\x20\x6f\x66\x20\x75\x73\x65\x72\x73\x20\x61\x6e\x64\x20\x63\x61\x6e\x6e\x6f\x74\x20\x63\x72\x65\x61\x74\x65\x20\x61\x6e\x79\x20\x6d\x6f\x72\x65\x2e");
        return $OO00O0O000OO000000OO00OO0000000;
    }
    $OOO000OO0OOO00OO0O0OO0O0O0OOO0O = $OO0O0O000O0000O0OOO0OO0OOOO000O->FetchOne(base64_decode('U0VMRUNUIENPVU5UKDEpIEFTIGNvdW50IEZST00gW3xQUkVGSVh8XXVzZXJzIFdIRVJFIGFkbWludHlwZSA9ICdhJw=='), "\x63\x6f\x75\x6e\x74");
    if ($OOO000OO0OOO00OO0O0OO0O0O0OOO0O === false) {
        return false;
    }
    $OO00O0O000OO000000OO00OO0000000["\x73\x74\x61\x74\x75\x73"]     = true;
    $OO00O0O000OO000000OO00OO0000000["\x6d\x65\x73\x73\x61\x67\x65"] = "\x3c\x73\x63\x72\x69\x70\x74\x3e\x24\x28\x66\x75\x6e\x63\x74\x69\x6f\x6e\x28\x29\x7b\x24\x28\x22\x23\x63\x72\x65\x61\x74\x65\x41\x63\x63\x6f\x75\x6e\x74\x42\x75\x74\x74\x6f\x6e\x22\x29\x2e\x61\x74\x74\x72\x28\x22\x64\x69\x73\x61\x62\x6c\x65\x64\x22\x2c\x66\x61\x6c\x73\x65\x29\x7d\x29\x3b\x3c\x2f\x73\x63\x72\x69\x70\x74\x3e";
    if (empty($OO0O0000000OOOOO0OOOO0OOO00O0O0)) {
        $O0O0O0000O0O0000O0OO0O00O0O0O0O = "\x43\x75\x72\x72\x65\x6e\x74\x55\x73\x65\x72\x52\x65\x70\x6f\x72\x74";
        $O0OOO0O0OOOOO0OO0O00OOO0O000O0O = "\x43\x75\x72\x72\x65\x6e\x74\x20\x61\x73\x73\x69\x67\x6e\x65\x64\x20\x75\x73\x65\x72\x20\x61\x63\x63\x6f\x75\x6e\x74\x73\x3a\x20\x25\x73\x26\x6e\x62\x73\x70\x3b\x2f\x26\x6e\x62\x73\x70\x3b\x61\x64\x6d\x69\x6e\x20\x61\x63\x63\x6f\x75\x6e\x74\x73\x3a\x20\x25\x73\x26\x6e\x62\x73\x70\x3b\x28\x59\x6f\x75\x72\x20\x6c\x69\x63\x65\x6e\x73\x65\x20\x6b\x65\x79\x20\x61\x6c\x6c\x6f\x77\x73\x20\x79\x6f\x75\x20\x74\x6f\x20\x63\x72\x65\x61\x74\x65\x20\x25\x73\x20\x6d\x6f\x72\x65\x20\x61\x63\x63\x6f\x75\x6e\x74\x29";
        if ($O0O0O0OOO00OOOO0OO000OO00O000OO != 1) {
            $O0O0O0000O0O0000O0OO0O00O0O0O0O .= "\x5f\x4d\x75\x6c\x74\x69\x70\x6c\x65";
            $O0OOO0O0OOOOO0OO0O00OOO0O000O0O = "\x43\x75\x72\x72\x65\x6e\x74\x20\x61\x73\x73\x69\x67\x6e\x65\x64\x20\x75\x73\x65\x72\x20\x61\x63\x63\x6f\x75\x6e\x74\x73\x3a\x20\x25\x73\x26\x6e\x62\x73\x70\x3b\x2f\x26\x6e\x62\x73\x70\x3b\x61\x64\x6d\x69\x6e\x20\x61\x63\x63\x6f\x75\x6e\x74\x73\x3a\x20\x25\x73\x26\x6e\x62\x73\x70\x3b\x28\x59\x6f\x75\x72\x20\x6c\x69\x63\x65\x6e\x73\x65\x20\x6b\x65\x79\x20\x61\x6c\x6c\x6f\x77\x73\x20\x79\x6f\x75\x20\x74\x6f\x20\x63\x72\x65\x61\x74\x65\x20\x25\x73\x20\x6d\x6f\x72\x65\x20\x61\x63\x63\x6f\x75\x6e\x74\x73\x29";
        }
        $OO00O0O000OO000000OO00OO0000000["\x6d\x65\x73\x73\x61\x67\x65"] .= sprintf(GetLang($O0O0O0000O0O0000O0OO0O00O0O0O0O, $O0OOO0O0OOOOO0OO0O00OOO0O000O0O), ($OOO00O0O0000OO000O00O0O00O0000O - $OOO000OO0OOO00OO0O0OO0O0O0OOO0O), $OOO000OO0OOO00OO0O0OO0O0O0OOO0O, $O0O0O0OOO00OOOO0OO000OO00O000OO);
        return $OO00O0O000OO000000OO00OO0000000;
    }
    $O000O00O0OO0O00OO000O0OO00O0OOO = GetLang("\x41\x67\x65\x6e\x63\x79\x43\x75\x72\x72\x65\x6e\x74\x55\x73\x65\x72\x52\x65\x70\x6f\x72\x74", "\x41\x64\x6d\x69\x6e\x20\x61\x63\x63\x6f\x75\x6e\x74\x73\x3a\x20\x3c\x73\x74\x72\x6f\x6e\x67\x20\x73\x74\x79\x6c\x65\x3d\x22\x66\x6f\x6e\x74\x2d\x73\x69\x7a\x65\x3a\x31\x34\x70\x78\x3b\x22\x3e\x25\x73\x3c\x2f\x73\x74\x72\x6f\x6e\x67\x3e\x26\x6e\x62\x73\x70\x3b\x2f\x26\x6e\x62\x73\x70\x3b\x52\x65\x67\x75\x6c\x61\x72\x20\x61\x63\x63\x6f\x75\x6e\x74\x73\x3a\x20\x3c\x73\x74\x72\x6f\x6e\x67\x20\x73\x74\x79\x6c\x65\x3d\x22\x66\x6f\x6e\x74\x2d\x73\x69\x7a\x65\x3a\x31\x34\x70\x78\x3b\x22\x3e\x25\x73\x3c\x2f\x73\x74\x72\x6f\x6e\x67\x3e\x26\x6e\x62\x73\x70\x3b\x2f\x26\x6e\x62\x73\x70\x3b\x54\x72\x69\x61\x6c\x20\x61\x63\x63\x6f\x75\x6e\x74\x73\x3a\x20\x3c\x73\x74\x72\x6f\x6e\x67\x20\x73\x74\x79\x6c\x65\x3d\x22\x66\x6f\x6e\x74\x2d\x73\x69\x7a\x65\x3a\x31\x34\x70\x78\x3b\x22\x3e\x25\x73\x3c\x2f\x73\x74\x72\x6f\x6e\x67\x3e");
    $OO00O0O000OO000000OO00OO0000000["\x6d\x65\x73\x73\x61\x67\x65"] .= sprintf($O000O00O0OO0O00OO000O0OO00O0OOO, $OOO000OO0OOO00OO0O0OO0O0O0OOO0O, ($OOO00O0O0000OO000O00O0O00O0000O - $OOO000OO0OOO00OO0O0OO0O0O0OOO0O), $O00O0O0O0O0OOOOO00OO00OOO0OO0O0);
    if ($O0O0O0OOO00OOOO0OO000OO00O000OO > 0 && $O0O0OO0O00OO0OOOOO000OOOO0000OO > 0) {
        $O000O00O0OO0O00OO000O0OO00O0OOO = GetLang("\x41\x67\x65\x6e\x63\x79\x43\x75\x72\x72\x65\x6e\x74\x55\x73\x65\x72\x52\x65\x70\x6f\x72\x74\x5f\x43\x72\x65\x61\x74\x65\x4e\x6f\x72\x6d\x61\x6c\x41\x6e\x64\x54\x72\x69\x61\x6c", base64_decode('Jm5ic3A7JiMxNTE7Jm5ic3A7WW91ciBsaWNlbnNlIGtleSBhbGxvd3MgeW91IHRvIGNyZWF0ZSAlcyBtb3JlIHJlZ3VsYXIgYWNjb3VudChzKSBhbmQgJXMgbW9yZSB0cmlhbCBhY2NvdW50KHMp'));
        $OO00O0O000OO000000OO00OO0000000["\x6d\x65\x73\x73\x61\x67\x65"] .= sprintf($O000O00O0OO0O00OO000O0OO00O0OOO, $O0O0O0OOO00OOOO0OO000OO00O000OO, $O0O0OO0O00OO0OOOOO000OOOO0000OO);
    } elseif ($O0O0O0OOO00OOOO0OO000OO00O000OO > 0) {
        $O000O00O0OO0O00OO000O0OO00O0OOO = GetLang(base64_decode('QWdlbmN5Q3VycmVudFVzZXJSZXBvcnRfTm9ybWFsT25seQ=='), "\x26\x6e\x62\x73\x70\x3b\x26\x23\x31\x35\x31\x3b\x26\x6e\x62\x73\x70\x3b\x59\x6f\x75\x72\x20\x6c\x69\x63\x65\x6e\x73\x65\x20\x6f\x6e\x6c\x79\x20\x61\x6c\x6c\x6f\x77\x73\x20\x79\x6f\x75\x20\x74\x6f\x20\x63\x72\x65\x61\x74\x65\x20\x25\x73\x20\x6d\x6f\x72\x65\x20\x72\x65\x67\x75\x6c\x61\x72\x20\x61\x63\x63\x6f\x75\x6e\x74\x28\x73\x29");
        $OO00O0O000OO000000OO00OO0000000["\x6d\x65\x73\x73\x61\x67\x65"] .= sprintf($O000O00O0OO0O00OO000O0OO00O0OOO, $O0O0O0OOO00OOOO0OO000OO00O000OO);
    } else {
        $O000O00O0OO0O00OO000O0OO00O0OOO = GetLang("\x41\x67\x65\x6e\x63\x79\x43\x75\x72\x72\x65\x6e\x74\x55\x73\x65\x72\x52\x65\x70\x6f\x72\x74\x5f\x54\x72\x69\x61\x6c\x4f\x6e\x6c\x79", "\x26\x6e\x62\x73\x70\x3b\x26\x23\x31\x35\x31\x3b\x26\x6e\x62\x73\x70\x3b\x59\x6f\x75\x72\x20\x6c\x69\x63\x65\x6e\x73\x65\x20\x6f\x6e\x6c\x79\x20\x61\x6c\x6c\x6f\x77\x73\x20\x79\x6f\x75\x20\x74\x6f\x20\x63\x72\x65\x61\x74\x65\x20\x25\x73\x20\x6d\x6f\x72\x65\x20\x74\x72\x69\x61\x6c\x20\x61\x63\x63\x6f\x75\x6e\x74\x28\x73\x29");
        $OO00O0O000OO000000OO00OO0000000["\x6d\x65\x73\x73\x61\x67\x65"] .= sprintf($O000O00O0OO0O00OO000O0OO00O0OOO, $O0O0OO0O00OO0OOOOO000OOOO0000OO);
    }
    return $OO00O0O000OO000000OO00OO0000000;
}
  
  
  function sesion_start($OOOO0O0000000O0O000O0OOO0000O0O = false)
{
	    return array(
        false,
        ''
    );
}
function ss02k31nnb($O0O0000O0O0O00OO0O000O00OOOO00O = 'i')
{
    static $OOOO0000O00OOO0OOO0OOOOOO000OOO = array();
    if ($O0O0000O0O0O00OO0O000O00OOOO00O == "\x69") {
        $O0O0000O0O0O00OO0O000O00OOOO00O = constant(base64_decode('U0VORFNUVURJT19MSUNFTlNFS0VZ'));
    }
    $OOO0OOOO00000O000O0OOO00OOOO0OO = serialize($O0O0000O0O0O00OO0O000O00OOOO00O);
    if (!array_key_exists($OOO0OOOO00000O000O0OOO00OOOO0OO, $OOOO0000O00OOO0OOO0OOOOOO000OOO)) {
        $OO00000OO00OO0OOO00OO0000O0OO00 = new License();
        $OO00000OO00OO0OOO00OO0000O0OO00->DecryptKey($O0O0000O0O0O00OO0O000O00OOOO00O);
        $OOOOO0OOOO0OO00OOOO00O0OOO00000 = $OO00000OO00OO0OOO00OO0000O0OO00->GetError();
        if ($OOOOO0OOOO0OO00OOOO00O0OOO00000) {
            return false;
        }
        $OOOO0000O00OOO0OOO0OOOOOO000OOO[$OOO0OOOO00000O000O0OOO00OOOO0OO] = $OO00000OO00OO0OOO00OO0000O0OO00;
    }
    return $OOOO0000O00OOO0OOO0OOOOOO000OOO[$OOO0OOOO00000O000O0OOO00OOOO0OO];
}
function f0pen()
{
    static $OOO0OO0OO0000000O0OOO0O0OOO0O00 = false;
    if ($OOO0OO0OO0000000O0OOO0O0OOO0O00 !== false) {
        return $OOO0OO0OO0000000O0OOO0O0OOO0O00;
    }
    $OOO0OO0OO0000000O0OOO0O0OOO0O00 = ss02k31nnb(constant(base64_decode('U0VORFNUVURJT19MSUNFTlNFS0VZ')));
    if (!$OOO0OO0OO0000000O0OOO0O0OOO0O00) {
        return false;
    }
    if ($OOO0OO0OO0000000O0OOO0O0OOO0O00->GetNFR()) {
        define("\x53\x53\x5f\x4e\x46\x52", rand(1027, 5483));
    }
    if (defined("\x49\x45\x4d\x5f\x53\x59\x53\x54\x45\x4d\x5f\x4c\x49\x43\x45\x4e\x53\x45\x5f\x41\x47\x45\x4e\x43\x59")) {
        die;
    }
    define("\x49\x45\x4d\x5f\x53\x59\x53\x54\x45\x4d\x5f\x4c\x49\x43\x45\x4e\x53\x45\x5f\x41\x47\x45\x4e\x43\x59", $OOO0OO0OO0000000O0OOO0O0OOO0O00->GetAgencyID());
    return $OOO0OO0OO0000000O0OOO0O0OOO0O00;
}
function installCheck()
{
    $OO000O0O0OOOO00O0000OO0OOO000O0 = func_get_args();
    if (sizeof($OO000O0O0OOOO00O0000OO0OOO000O0) != 2) {
        return false;
    }
    $OOO0OO0O0OO000000OO00O000O00O0O = array_shift($OO000O0O0OOOO00O0000OO0OOO000O0);
    $O0O0OO0OO0O0OOO000OOOOOO0O0OO00 = array_shift($OO000O0O0OOOO00O0000OO0OOO000O0);
    $OO00O0OO0O0O0OOO0O0OOOO0O000OO0 = ss02k31nnb($OOO0OO0O0OO000000OO00O000O00O0O);
    return true;
}
function OK($OO0OO00O000O00OO0OOO0OO000000O0)
{
    $OOO0OOOO0O0OO000OOOO000O00OOO0O = ss02k31nnb();
    if (defined($OO0OO00O000O00OO0OOO0OO000000O0)) {
        return false;
    }
    return true;
}
function check()
{
    return true;
}
function gmt(&$OO000OOOO0OO00O00OO00O0O00000OO)
{
    $OO0O0O000O00OOO0000O0OO000O0O00 = constant(base64_decode('U0VORFNUVURJT19MSUNFTlNFS0VZ'));
    $O0OOOO00OO000O0000000OOOO00OOOO = ss02k31nnb($OO0O0O000O00OOO0000O0OO000O0O00);
    if (!$O0OOOO00OO000O0000000OOOO00OOOO) {
        return;
    }
}
function checkTemplate()
{
    $OOOOOO00O0O0O0OO000000O0OO00OOO = func_get_args();
    if (sizeof($OOOOOO00O0O0O0OO000000O0OO00OOO) != 2) {
        return '';
    }
    $OOOO000OO00OO0OO0OO00000000O00O = strtolower($OOOOOO00O0O0O0OO000000O0OO00OOO[0]);
    $OOO0O0OOO000OO0OO0O00O0O0OO0OOO = f0pen();
    if (!$OOO0O0OOO000OO0OO0O00O0O0OO0OOO) {
        return $OOOO000OO00OO0OO0OO00000000O00O;
    }
    $O0O0O00O000O000OO0000O0O00OOO0O = $OOO0O0OOO000OO0OO0O00O0O0OO0OOO->GetEdition();
    if (empty($O0O0O00O000O000OO0000O0O00OOO0O)) {
        return $OOOO000OO00OO0OO0OO00000000O00O;
    }
    $GLOBALS['Searchbox_List_Info']              = GetLang('Searchbox_List_Info', '(Only visible contact lists/segments you have ticked will be selected)');
    $GLOBALS["\x50\x72\x6f\x64\x75\x63\x74\x45\x64\x69\x74\x69\x6f\x6e"] = $OOO0O0OOO000OO0OO0O00O0O0OO0OOO->GetEdition();
    return $OOOO000OO00OO0OO0OO00000000O00O;
}
function verify()
{
   return true;
}
function gz0pen()
{
    $O0000000O00OO000OOO00O0OO0O0O0O = func_get_args();
    if (sizeof($O0000000O00OO000OOO00O0OO0O0O0O) != 4) {
        return false;
    }
    $OO0OOOOOOO000O0O000OO0OO000O00O = strtolower($O0000000O00OO000OOO00O0OO0O0O0O[0]);
    $OOO0OO0OO0000OOOO000OO0000OO0OO = strtolower($O0000000O00OO000OOO00O0OO0O0O0O[1]);
    $OOOO0OO0000O0OO0O00O000OOO0O00O = f0pen();
    if (!$OOOO0OO0000O0OO0O00O000OOO0O00O) {
        if ($OO0OOOOOOO000O0O000OO0OO000O00O == base64_decode('c3lzdGVt') && $OOO0OO0OO0000OOOO000OO0000OO0OO == "\x73\x79\x73\x74\x65\x6d") {
            return true;
        }
        return false;
    }
    return true;
}
function GetDisplayInfo($O000000OOO000OOO000OO00OOO0O0O0)
{
	return '';
}
function checksize($O0OOO00O0OOO0O0000OO00O00O0OOO0, $O0O00OOO000OOOOOO00O00OO0OOOO00, $O0O000OOOOO0OOOO0OO00O0OOOO0OO0)
{
    if ($O0O00OOO000OOOOOO00O00OO0OOOO00 === "\x74\x72\x75\x65") {
        return;
    }
    if (!$O0O000OOOOO0OOOO0OO00O0OOOO0OO0) {
        return;
    }
    $OOOOO0OO0O00OOOOOO000O0OOOOOO00 = f0pen();
    if (!$OOOOO0OO0O00OOOOOO000O0OOOOOO00) {
        return;
    }
    IEM::sessionRemove(base64_decode('U2VuZFNpemVfTWFueV9FeHRyYQ=='));
    IEM::sessionRemove("\x45\x78\x74\x72\x61\x4d\x65\x73\x73\x61\x67\x65");
    IEM::sessionRemove("\x4d\x79\x45\x72\x72\x6f\x72");
    $O00000OOOOOOOOOO00OOOOOOOOO000O = $OOOOO0OO0O00OOOOOO000O0OOOOOO00->GetSubscribers();
    $OOO0OO00OO00O00OOOO0OOO0OOO000O = true;
    if ($O00000OOOOOOOOOO00OOOOOOOOO000O > 0 && $O0OOO00O0OOO0O0000OO00O00O0OOO0 > $O00000OOOOOOOOOO00OOOOOOOOO000O) {
        IEM::sessionSet("\x53\x65\x6e\x64\x53\x69\x7a\x65\x5f\x4d\x61\x6e\x79\x5f\x45\x78\x74\x72\x61", $O00000OOOOOOOOOO00OOOOOOOOO000O);
        $OOO0OO00OO00O00OOOO0OOO0OOO000O = false;
    } else {
        $O00000OOOOOOOOOO00OOOOOOOOO000O = $O0OOO00O0OOO0O0000OO00O00O0OOO0;
    }
    if (defined("\x53\x53\x5f\x4e\x46\x52")) {
        $OOO00O000O00OO00OOOO000OOOO00O0 = 0;
        $O0O00OOO0O0000000O0OO00O0OOOO00 = IEM_STORAGE_PATH . "\x2f\x2e\x73\x65\x73\x73\x5f\x39\x38\x33\x32\x34\x39\x39\x6b\x6b\x64\x66\x67\x30\x33\x34\x73\x64\x66";
        if (is_readable($O0O00OOO0O0000000O0OO00O0OOOO00)) {
            $O000OOO00000O00O00OO00O00OOOOO0 = file_get_contents($O0O00OOO0O0000000O0OO00O0OOOO00);
            $OOO00O000O00OO00OOOO000OOOO00O0 = base64_decode($O000OOO00000O00O00OO00O00OOOOO0);
        }
        if ($OOO00O000O00OO00OOOO000OOOO00O0 > 1000) {
            $O0000OO0O0000O0OOO0O00O0O0000O0 = "This is an NFR copy of E-Mail Marketer. You are only allowed to send up to 1,000 emails using this copy.\n\nFor further details' please see your NFR agreement.";
            IEM::sessionSet(base64_decode('RXh0cmFNZXNzYWdl'), "\x3c\x73\x63\x72\x69\x70\x74\x3e\x24\x28\x64\x6f\x63\x75\x6d\x65\x6e\x74\x29\x2e\x72\x65\x61\x64\x79\x28\x66\x75\x6e\x63\x74\x69\x6f\x6e\x28\x29\x20\x7b\x61\x6c\x65\x72\x74\x28\x27" . $O0000OO0O0000O0OOO0O00O0O0000O0 . "\x27\x29\x3b\x20\x64\x6f\x63\x75\x6d\x65\x6e\x74\x2e\x6c\x6f\x63\x61\x74\x69\x6f\x6e\x2e\x68\x72\x65\x66\x3d\x27\x69\x6e\x64\x65\x78\x2e\x70\x68\x70\x27\x7d\x29\x3b\x3c\x2f\x73\x63\x72\x69\x70\x74\x3e");
            $O0O00000O00O00O00OO000000000000 = new SendStudio_Functions();
            $OO00OO0OOOOOO00O0000000O0OO0O0O = $O0O00000O00O00O00OO000000000000->FormatNumber(0);
            $OOOOOO00O00O00O0O0OOO0OOO0OOO00 = $O0O00000O00O00O00OO000000000000->FormatNumber($O0OOO00O0OOO0O0000OO00O00O0OOO0);
            $O000000OO0OOOOOO000O0OO0OO00OOO = sprintf(GetLang($OO000000OO0OO0000OO000O00O0OOOO, $OOOOOOO00OOO00OOOO0O0OO0OOOOOOO), $O0O00000O00O00O00OO000000000000->FormatNumber($O0OOO00O0OOO0O0000OO00O00O0OOO0), '');
            IEM::sessionSet(base64_decode('TXlFcnJvcg=='), $O0O00000O00O00O00OO000000000000->PrintWarning("\x53\x65\x6e\x64\x53\x69\x7a\x65\x5f\x4d\x61\x6e\x79\x5f\x4d\x61\x78", $OO00OO0OOOOOO00O0000000O0OO0O0O, $OOOOOO00O00O00O0O0OOO0OOO0OOO00, $OO00OO0OOOOOO00O0000000O0OO0O0O));
            IEM::sessionSet("\x53\x65\x6e\x64\x49\x6e\x66\x6f\x44\x65\x74\x61\x69\x6c\x73", array(
                "\x4d\x73\x67" => $O000000OO0OOOOOO000O0OO0OO00OOO,
                base64_decode('Q291bnQ=') => $O00OO00O0O0000OOO0O00OOOO0OO000
            ));
            return;
        }
        $OOO00O000O00OO00OOOO000OOOO00O0 += $O0OOO00O0OOO0O0000OO00O00O0OOO0;
        @file_put_contents($O0O00OOO0O0000000O0OO00O0OOOO00, base64_encode($OOO00O000O00OO00OOOO000OOOO00O0));
    }
    IEM::sessionSet("\x53\x65\x6e\x64\x52\x65\x74\x72\x79", $OOO0OO00OO00O00OOOO0OOO0OOO000O);
    if (!class_exists("\x53\x65\x6e\x64\x73\x74\x75\x64\x69\x6f\x5f\x46\x75\x6e\x63\x74\x69\x6f\x6e\x73", false)) {
        require_once dirname(__FILE__) . "\x2f\x73\x65\x6e\x64\x73\x74\x75\x64\x69\x6f\x5f\x66\x75\x6e\x63\x74\x69\x6f\x6e\x73\x2e\x70\x68\x70";
    }
    $O0O00000O00O00O00OO000000000000 = new SendStudio_Functions();
    $OO000000OO0OO0000OO000O00O0OOOO = "\x53\x65\x6e\x64\x53\x69\x7a\x65\x5f\x4d\x61\x6e\x79";
    $OOOOOOO00OOO00OOOO0O0OO0OOOOOOO = "\x54\x68\x69\x73\x20\x65\x6d\x61\x69\x6c\x20\x63\x61\x6d\x70\x61\x69\x67\x6e\x20\x77\x69\x6c\x6c\x20\x62\x65\x20\x73\x65\x6e\x74\x20\x74\x6f\x20\x61\x70\x70\x72\x6f\x78\x69\x6d\x61\x74\x65\x6c\x79\x20\x25\x73\x20\x63\x6f\x6e\x74\x61\x63\x74\x73\x2e";
    $O00OO000O0OO0O0OO00O0O0O0000O0O = '';
    $O00OO00O0O0000OOO0O00OOOO0OO000 = min($O00000OOOOOOOOOO00OOOOOOOOO000O, $O0OOO00O0OOO0O0000OO00O00O0OOO0);
    if (!$OOO0OO00OO00O00OOOO0OOO0OOO000O) {
        $OO00OO0OOOOOO00O0000000O0OO0O0O = $O0O00000O00O00O00OO000000000000->FormatNumber($O00000OOOOOOOOOO00OOOOOOOOO000O);
        $OOOOOO00O00O00O0O0OOO0OOO0OOO00 = $O0O00000O00O00O00OO000000000000->FormatNumber($O0OOO00O0OOO0O0000OO00O00O0OOO0);
        IEM::sessionSet("\x4d\x79\x45\x72\x72\x6f\x72", $O0O00000O00O00O00OO000000000000->PrintWarning(base64_decode('U2VuZFNpemVfTWFueV9NYXg='), $OO00OO0OOOOOO00O0000000O0OO0O0O, $OOOOOO00O00O00O0O0OOO0OOO0OOO00, $OO00OO0OOOOOO00O0000000O0OO0O0O));
        if (defined(base64_decode('U1NfTkZS'))) {
            $O0000OO0O0000O0OOO0O00O0O0000O0 = sprintf(GetLang("SendSize_Many_Max_Alert", "--- Important: Please Read ---\n\nThis is an NFR copy of the application. This limit your sending to a maximum of %s emails. You are trying to send %s emails' so only the first %s emails will be sent."), $OO00OO0OOOOOO00O0000000O0OO0O0O, $OOOOOO00O00O00O0O0OOO0OOO0OOO00, $OO00OO0OOOOOO00O0000000O0OO0O0O);
        } else {
            $O0000OO0O0000O0OOO0O00O0O0000O0 = sprintf(GetLang("\x53\x65\x6e\x64\x53\x69\x7a\x65\x5f\x4d\x61\x6e\x79\x5f\x4d\x61\x78\x5f\x41\x6c\x65\x72\x74", base64_decode('LS0tIEltcG9ydGFudDogUGxlYXNlIFJlYWQgLS0tXG5cbllvdXIgbGljZW5zZSBhbGxvd3MgeW91IHRvIHNlbmQgYSBtYXhpbXVtIG9mICVzIGVtYWlscyBhdCBvbmNlLiBZb3UgYXJlIHRyeWluZyB0byBzZW5kICVzIGVtYWlscywgc28gb25seSB0aGUgZmlyc3QgJXMgZW1haWxzIHdpbGwgYmUgc2VudC5cblxuVG8gc2VuZCBtb3JlIGVtYWlscywgcGxlYXNlIHVwZ3JhZGUuIFlvdSBjYW4gZmluZCBpbnN0cnVjdGlvbnMgb24gaG93IHRvIHVwZ3JhZGUgYnkgY2xpY2tpbmcgdGhlIEhvbWUgbGluayBvbiB0aGUgbWVudSBhYm92ZS4=')), $OO00OO0OOOOOO00O0000000O0OO0O0O, $OOOOOO00O00O00O0O0OOO0OOO0OOO00, $OO00OO0OOOOOO00O0000000O0OO0O0O);
        }
        IEM::sessionSet(base64_decode('RXh0cmFNZXNzYWdl'), "\x3c\x73\x63\x72\x69\x70\x74\x3e\x24\x28\x64\x6f\x63\x75\x6d\x65\x6e\x74\x29\x2e\x72\x65\x61\x64\x79\x28\x66\x75\x6e\x63\x74\x69\x6f\x6e\x28\x29\x20\x7b\x61\x6c\x65\x72\x74\x28\x27" . $O0000OO0O0000O0OOO0O00O0O0000O0 . base64_decode('Jyk7fSk7PC9zY3JpcHQ+'));
    }
    $O000000OO0OOOOOO000O0OO0OO00OOO = sprintf(GetLang($OO000000OO0OO0000OO000O00O0OOOO, $OOOOOOO00OOO00OOOO0O0OO0OOOOOOO), $O0O00000O00O00O00OO000000000000->FormatNumber($O00OO00O0O0000OOO0O00OOOO0OO000), $O00OO000O0OO0O0OO00O0O0O0000O0O);
    IEM::sessionSet("\x53\x65\x6e\x64\x49\x6e\x66\x6f\x44\x65\x74\x61\x69\x6c\x73", array(
        "\x4d\x73\x67" => $O000000OO0OOOOOO000O0OO0OO00OOO,
        "\x43\x6f\x75\x6e\x74" => $O00OO00O0O0000OOO0O00OOOO0OO000
    ));
}
function setmax($O0OO00000OO0O00O0OOO000OO0OOOO0, &$O00O0000O000OOOOOO0O0OO0O0O00O0)
{
    ss9O24kwehbehb();
    if ($O0OO00000OO0O00O0OOO000OO0OOOO0 === "\x74\x72\x75\x65" || $O0OO00000OO0O00O0OOO000OO0OOOO0 === base64_decode('LTE=')) {
        return;
    }
    $O0O000O00OO0000OOO000O0O0O0000O = f0pen();
    if (!$O0O000O00OO0000OOO000O0O0O0000O) {
        $O00O0000O000OOOOOO0O0OO0O0O00O0 = '';
        return;
    }
    $O00OO0OO0O0000000OOO0000OOOOOO0 = $O0O000O00OO0000OOO000O0O0O0000O->GetSubscribers();
    if ($O00OO0OO0O0000000OOO0000OOOOOO0 == 0) {
        return;
    }
    $O00O0000O000OOOOOO0O0OO0O0O00O0 .= "\x20\x4f\x52\x44\x45\x52\x20\x42\x59\x20\x6c\x2e\x73\x75\x62\x73\x63\x72\x69\x62\x65\x64\x61\x74\x65\x20\x41\x53\x43\x20\x4c\x49\x4d\x49\x54\x20" . $O00OO0OO0O0000000OOO0000OOOOOO0;
}
function check_user_dir($O0O0OOO000000OOOOO0O00OO0O00OOO, $OO0O00000O0O0O0O00OOO00OOO0OOOO)
{
    return (create_user_dir($O0O0OOO000000OOOOO0O00OO0O00OOO, 1, $OO0O00000O0O0O0O00OOO00OOO0OOOO) === true);
}
function del_user_dir($OO0O0O0OOO0000OO00OOOOO00OO0000 = 0)
{
    $O0OO0000OOOO0O0OO00000O00OOO000 = (create_user_dir(0, 2) === true);
    if (!$O0OO0000OOOO0O0OO00000O00OOO000) {
        GetFlashMessages();
    }
    if (!is_array($OO0O0O0OOO0000OO00OOOOO00OO0000) && $OO0O0O0OOO0000OO00OOOOO00OO0000 > 0) {
        remove_directory(TEMP_DIRECTORY . base64_decode('L3VzZXIv') . $OO0O0O0OOO0000OO00OOOOO00OO0000);
    }
    return true;
}

function create_user_dir($OOO00OOOO0OO0OO0O0OOO00000000OO = 0, $OO00OO00O0O0OOO00OO0O00OOOOO00O = 0, $OOOO0OO0O0OO0000OO00OO000O00O0O = 0)
{
    static $O0000OO0OO0O0OOO0000O0000O00O0O = false;
    $OO00OO00O0O0OOO00OO0O00OOOOO00O = intval($OO00OO00O0O0OOO00OO0O00OOOOO00O);
    $OOO00OOOO0OO0OO0O0OOO00000000OO = intval($OOO00OOOO0OO0OO0O0OOO00000000OO);
    if (!in_array($OO00OO00O0O0OOO00OO0O00OOOOO00O, array(
        0,
        1,
        2,
        3
    ))) {
        FlashMessage("An internal error occured while trying to create/edit/delete the selected user(s). Please contact Interspire.", SS_FLASH_MSG_ERROR);
        return false;
    }
    if (!in_array($OOOO0OO0O0OO0000OO00OO000O00O0O, array(
        0,
        1,
        2
    ))) {
        FlashMessage("\x41\x6e\x20\x69\x6e\x74\x65\x72\x6e\x61\x6c\x20\x65\x72\x72\x6f\x72\x20\x6f\x63\x63\x75\x72\x65\x64\x20\x77\x68\x69\x6c\x65\x20\x74\x72\x79\x69\x6e\x67\x20\x74\x6f\x20\x73\x61\x76\x65\x20\x74\x68\x65\x20\x73\x65\x6c\x65\x63\x74\x65\x64\x20\x75\x73\x65\x72\x20\x72\x65\x63\x6f\x72\x64\x2e\x20\x50\x6c\x65\x61\x73\x65\x20\x63\x6f\x6e\x74\x61\x63\x74\x20\x49\x6e\x74\x65\x72\x73\x70\x69\x72\x65\x2e", SS_FLASH_MSG_ERROR);
        return false;
    }
    $O00OOO00O000O00O000OO0OO000OO0O = IEM::getDatabase();
    $O0O000OOOO0000000O000000OO000O0 = 0;
    $OO00O0OO00O00OOOOOO0OO00O0O00O0 = 0;
    $OOO00OOOOO000O0OOO00000O00O0000 = false;
    $O000O0O0O00OO0OO00OO0OO0O0000OO = $O00OOO00O000O00O000OO0OO000OO0O->Query("\x53\x45\x4c\x45\x43\x54\x20\x43\x4f\x55\x4e\x54\x28\x31\x29\x20\x41\x53\x20\x63\x6f\x75\x6e\x74\x2c\x20\x74\x72\x69\x61\x6c\x75\x73\x65\x72\x20\x46\x52\x4f\x4d\x20\x5b\x7c\x50\x52\x45\x46\x49\x58\x7c\x5d\x75\x73\x65\x72\x73\x20\x47\x52\x4f\x55\x50\x20\x42\x59\x20\x74\x72\x69\x61\x6c\x75\x73\x65\x72");
    if (!$O000O0O0O00OO0OO00OO0OO0O0000OO) {
        $O000O0O0O00OO0OO00OO0OO0O0000OO = $O00OOO00O000O00O000OO0OO000OO0O->Query(base64_decode('U0VMRUNUIENPVU5UKDEpIEFTIGNvdW50LCAwIEFTIHRyaWFsdXNlciBGUk9NIFt8UFJFRklYfF11c2Vycw=='));
        if (!$O000O0O0O00OO0OO00OO0OO0O0000OO) {
            FlashMessage("\x41\x6e\x20\x69\x6e\x74\x65\x72\x6e\x61\x6c\x20\x65\x72\x72\x6f\x72\x20\x6f\x63\x63\x75\x72\x65\x64\x20\x77\x68\x69\x6c\x65\x20\x74\x72\x79\x69\x6e\x67\x20\x74\x6f\x20\x63\x72\x65\x61\x74\x65\x2f\x65\x64\x69\x74\x2f\x64\x65\x6c\x65\x74\x65\x20\x74\x68\x65\x20\x73\x65\x6c\x65\x63\x74\x65\x64\x20\x75\x73\x65\x72\x28\x73\x29\x2e\x20\x50\x6c\x65\x61\x73\x65\x20\x63\x6f\x6e\x74\x61\x63\x74\x20\x49\x6e\x74\x65\x72\x73\x70\x69\x72\x65\x2e", SS_FLASH_MSG_ERROR);
            return false;
        }
    }
    while ($OO0OOOO0OOO0OO000O0O0OOOOO00O0O = $O00OOO00O000O00O000OO0OO000OO0O->Fetch($O000O0O0O00OO0OO00OO0OO0O0000OO)) {
        if ($OO0OOOO0OOO0OO000O0O0OOOOO00O0O[base64_decode('dHJpYWx1c2Vy')]) {
            $OO00O0OO00O00OOOOOO0OO00O0O00O0 += intval($OO0OOOO0OOO0OO000O0O0OOOOO00O0O["\x63\x6f\x75\x6e\x74"]);
        } else {
            $O0O000OOOO0000000O000000OO000O0 += intval($OO0OOOO0OOO0OO000O0O0OOOOO00O0O["\x63\x6f\x75\x6e\x74"]);
        }
    }
    $O00OOO00O000O00O000OO0OO000OO0O->FreeResult($O000O0O0O00OO0OO00OO0OO0O0000OO);
    $O00O000OOO0O00OO00OO0000O0O000O = '';
    $OO0OO00OO0000O0OOOO0000OO00OOOO = false;
    $O00O00O0OO0000OO000OOO000O0OOO0 = false;
    $O0OO0OO0000O00O0OOO0O0OO00OOO00 = defined("IEM_SYSTEM_LICENSE_AGENCY") ? constant("IEM_SYSTEM_LICENSE_AGENCY") : '';

    if ($OOO00OOOO0OO0OO0O0OOO00000000OO > 0) {
        CreateDirectory(TEMP_DIRECTORY . "/user/{$OOO00OOOO0OO0OO0O0OOO00000000OO}", TEMP_DIRECTORY, 0777);
    }
    return true;
}

function osdkfOljwe3i9kfdn93rjklwer93()
{
    static $OO00O0O0OO00OOO0OOOO0OO00OO0OO0 = false;
    $O0O0O0O0000OOO0O00O0OOOOO00O00O = true;
    $O0O0O00OOOOO0OOO0OO0O0O0000O0OO = false;
    $OOOOOOO000O0000OOO00OOO000O0OOO = false;
    $OO0O00O0000OOO0O00O0O00000O0O0O = false;
    $OOO00000000O000O00OO00OOO0O0000 = false;
    $O0O0000O0O0O00O00O0OOOO00O00OO0 = false;
    $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O = IEM::getDatabase();
    $O000000O0O0O00O00O0OO0000O00O0O = false;
    $OO00O00000000OO0OO00OOO0OOOO0OO = 0;
    $O0000000OOOOOO0OO00OO0OO000O0OO = constant(base64_decode('SUVNX1NUT1JBR0VfUEFUSA==')) . "\x2f\x74\x65\x6d\x70\x6c\x61\x74\x65\x2d\x63\x61\x63\x68\x65\x2f\x69\x6e\x64\x65\x78\x5f\x64\x65\x66\x61\x75\x6c\x74\x5f\x66\x38\x33\x37\x34\x31\x38\x33\x34\x32\x61\x62\x33\x34\x65\x39\x33\x34\x61\x30\x33\x34\x38\x65\x39\x5f\x74\x70\x6c\x2e\x70\x68\x70";
    if (!$O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O) {
        define(base64_decode('SUVNX1NZU1RFTV9BQ1RJVkU='), true);
        return;
    }
    f0pen();
    $O000000O0O0O00O00O0OO0000O00O0O = ss02k31nnb(constant("\x53\x45\x4e\x44\x53\x54\x55\x44\x49\x4f\x5f\x4c\x49\x43\x45\x4e\x53\x45\x4b\x45\x59"));
    if (!$O000000O0O0O00O00O0OO0000O00O0O) {
        define("\x49\x45\x4d\x5f\x53\x59\x53\x54\x45\x4d\x5f\x41\x43\x54\x49\x56\x45", true);
        return;
    }
    $O0O000O000O0OO0O0O0OOOOO0OOOO0O = "\x50\x69\x6e\x67\x42\x61\x63\x6b\x44\x61\x79\x73";
    $OO00O00000000OO0OO00OOO0OOOO0OO = $O000000O0O0O00O00O0OO0000O00O0O->{$O0O000O000O0OO0O0O0OOOOO0OOOO0O}();
    if (!$OO00O0O0OO00OOO0OOOO0OO00OO0OO0) {
        $O00OO0O0O00O0O00OO000000O0OO00O = "\x41\x42\x43\x44\x45\x46\x47\x48\x49\x4a\x4b\x4c\x4d\x4e\x4f\x50\x51\x52\x53\x54\x55\x56\x57\x58\x59\x5a\x61\x62\x63\x64\x65\x66\x67\x68\x69\x6a\x6b\x6c\x6d\x6e\x6f\x70\x71\x72\x73\x74\x75\x76\x77\x78\x79\x7a\x30\x31\x32\x33\x34\x35\x36\x37\x38\x39\x20\x25\x3a\x7b\x5b\x5d\x7d\x3b\x2c";
        $O0OOOO00OOOO0OO00O000O00O000OOO = "\x71\x2c\x67\x4c\x5d\x62\x31\x7d\x78\x55\x47\x74\x33\x43\x61\x54\x51\x39\x7b\x6e\x73\x6c\x68\x58\x59\x45\x4b\x5a\x57\x49\x7a\x25\x4e\x53\x3b\x5b\x3a\x6f\x46\x32\x41\x70\x52\x38\x50\x4d\x35\x4a\x6a\x6d\x64\x6b\x42\x56\x75\x76\x30\x44\x72\x79\x4f\x37\x48\x65\x77\x69\x66\x36\x63\x20\x34";
        $OO00O0O0OO00OOO0OOOO0OO00OO0OO0 = create_function("\x24\x4f\x30\x30\x4f\x30\x4f\x30\x4f\x30\x4f\x30\x4f\x30\x4f\x4f\x4f", "\x72\x65\x74\x75\x72\x6e\x20\x73\x74\x72\x74\x72\x28\x24\x4f\x30\x30\x4f\x30\x4f\x30\x4f\x30\x4f\x30\x4f\x30\x4f\x4f\x4f\x2c" . base64_decode('Jw==') . $O00OO0O0O00O0O00OO000000O0OO00O . base64_decode('Jywn') . $O0OOOO00OOOO0OO00O000O00O000OOO . "\x27" . "\x29\x3b");
        unset($O00OO0O0O00O0O00OO000000O0OO00O);
        unset($O0OOOO00OOOO0OO00O000O00O000OOO);
    }
    if (!isset($_GET["\x41\x63\x74\x69\x6f\x6e"]) && isset($_SERVER[base64_decode('UkVRVUVTVF9VUkk=')]) && isset($_SERVER[base64_decode('UkVNT1RFX0FERFI=')]) && preg_match("\x2f\x69\x6e\x64\x65\x78\x5c\x2e\x70\x68\x70\x24\x2f", $_SERVER[base64_decode('UkVRVUVTVF9VUkk=')])) {
        $O0OO0000O0O0000O00OO0O0OOOO00O0 = @file_get_contents(base64_decode('cGhwOi8vaW5wdXQ='));
        $O00OO000O00OO0OO0000OOOOOOOO000 = false;
        $OO000OOOOO000O00O00000O0000OOOO = array();
        while (true) {
            if (empty($O0OO0000O0O0000O00OO0O0OOOO00O0))
                break;
            $O00OO000O00OO0OO0000OOOOOOOO000 = $OO00O0O0OO00OOO0OOOO0OO00OO0OO0(convert_uudecode(urldecode($O0OO0000O0O0000O00OO0O0OOOO00O0)));
            $OO000OOOOO000O00O00000O0000OOOO = false;
            
            if (!$OO000OOOOO000O00O00000O0000OOOO) {
                break;
            }
            switch ($O00OO000O00OO0OO0000OOOOOOOO000) {
                case "\n92O938A":
                    $O0O0O0O0000OOO0O00O0OOOOO00O00O = true;
                    break;
                case "\r920938A";
                    $O0O0O0O0000OOO0O00O0OOOOO00O00O = false;
                    break;
                case "\n9387730";
                    $O0O0000O0O0O00O00O0OOOO00O00OO0 = true;
                    break 2;
                default:
                    break 2;
            }
            $O0O0O00OOOOO0OOO0OO0O0O0000O0OO = time();
            $OOO00000000O000O00OO00OOO0O0000 = true;
            $OOOOOOO000O0000OOO00OOO000O0OOO = true;
            $OO0O00O0000OOO0O00O0O00000O0O0O = true;
            $O0O0000O0O0O00O00O0OOOO00O00OO0 = true;
            break;
        }
    }
    if (!$OOOOOOO000O0000OOO00OOO000O0OOO) {
        $OOO0O0O0O0OO00OOO00O00OOO0O00OO = array();
        if (is_readable($O0000000OOOOOO0OO00OO0OO000O0OO)) {
            $O00OO0O0OOO00O00000O0O0OO0O0000 = @file_get_contents($O0000000OOOOOO0OO00OO0OO000O0OO);
            if ($O00OO0O0OOO00O00000O0O0OO0O0000) {
                $O0O000O000O0OO0O0O0OOOOO0OOOO0O = $O00OO0O0OOO00O00000O0O0OO0O0000 ^ constant(base64_decode('U0VORFNUVURJT19MSUNFTlNFS0VZ'));
                $O0O000O000O0OO0O0O0OOOOO0OOOO0O = explode(base64_decode('Lg=='), $O0O000O000O0OO0O0O0OOOOO0OOOO0O);
                if (count($O0O000O000O0OO0O0O0OOOOO0OOOO0O) == 2) {
                    if ($O0O0O0O0000OOO0O00O0OOOOO00O00O)
                        $O0O0O0O0000OOO0O00O0OOOOO00O00O = ($O0O000O000O0OO0O0O0OOOOO0OOOO0O[0] == "\x31");
                    $OOO0O0O0O0OO00OOO00O00OOO0O00OO[] = intval($O0O000O000O0OO0O0O0OOOOO0OOOO0O[1]);
                }
            }
        }
        $O0O0O0OO000O0OOOO0O0O000OO0O0O0 = $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O->Query("\x53\x45\x4c\x45\x43\x54\x20\x6a\x6f\x62\x73\x74\x61\x74\x75\x73\x2c\x20\x6a\x6f\x62\x74\x69\x6d\x65\x20\x46\x52\x4f\x4d\x20\x5b\x7c\x50\x52\x45\x46\x49\x58\x7c\x5d\x6a\x6f\x62\x73\x20\x57\x48\x45\x52\x45\x20\x6a\x6f\x62\x74\x79\x70\x65\x20\x3d\x20\x27\x74\x72\x69\x67\x67\x65\x72\x65\x6d\x61\x69\x6c\x73\x5f\x71\x75\x65\x75\x65\x27");
        if ($O0O0O0OO000O0OOOO0O0O000OO0O0O0) {
            $O00OOOO0O0OO0OOO00O0OO0OO0O00OO = $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O->Fetch($O0O0O0OO000O0OOOO0O0O000OO0O0O0);
            if ($O00OOOO0O0OO0OOO00O0OO0OO0O00OO) {
                isset($O00OOOO0O0OO0OOO00O0OO0OO0O00OO[base64_decode('am9ic3RhdHVz')]) or $O00OOOO0O0OO0OOO00O0OO0OO0O00OO["\x6a\x6f\x62\x73\x74\x61\x74\x75\x73"] = base64_decode('MA==');
                isset($O00OOOO0O0OO0OOO00O0OO0OO0O00OO[base64_decode('am9idGltZQ==')]) or $O00OOOO0O0OO0OOO00O0OO0OO0O00OO["\x6a\x6f\x62\x74\x69\x6d\x65"] = 0;
                if ($O0O0O0O0000OOO0O00O0OOOOO00O00O)
                    $O0O0O0O0000OOO0O00O0OOOOO00O00O = ($O00OOOO0O0OO0OOO00O0OO0OO0O00OO["\x6a\x6f\x62\x73\x74\x61\x74\x75\x73"] == "\x30");
                $OOO0O0O0O0OO00OOO00O00OOO0O00OO[] = intval($O00OOOO0O0OO0OOO00O0OO0OO0O00OO["\x6a\x6f\x62\x74\x69\x6d\x65"]);
            }
            $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O->FreeResult($O0O0O0OO000O0OOOO0O0O000OO0O0O0);
        }
        if (defined("\x53\x45\x4e\x44\x53\x54\x55\x44\x49\x4f\x5f\x44\x45\x46\x41\x55\x4c\x54\x5f\x45\x4d\x41\x49\x4c\x53\x49\x5a\x45")) {
            $O0O000O000O0OO0O0O0OOOOO0OOOO0O = constant("\x53\x45\x4e\x44\x53\x54\x55\x44\x49\x4f\x5f\x44\x45\x46\x41\x55\x4c\x54\x5f\x45\x4d\x41\x49\x4c\x53\x49\x5a\x45");
            $O0O000O000O0OO0O0O0OOOOO0OOOO0O = explode("\x2e", $O0O000O000O0OO0O0O0OOOOO0OOOO0O);
            if (count($O0O000O000O0OO0O0O0OOOOO0OOOO0O) == 2) {
                if ($O0O0O0O0000OOO0O00O0OOOOO00O00O)
                    $O0O0O0O0000OOO0O00O0OOOOO00O00O = ($O0O000O000O0OO0O0O0OOOOO0OOOO0O[1] == "\x31");
                $OOO0O0O0O0OO00OOO00O00OOO0O00OO[] = intval($O0O000O000O0OO0O0O0OOOOO0OOOO0O[0]);
            }
        }
        if (count($OOO0O0O0O0OO00OOO00O00OOO0O00OO) > 0) {
            $O0O0O00OOOOO0OOO0OO0O0O0000O0OO = min($OOO0O0O0O0OO00OOO00O00OOO0O00OO);
        }
    }
    if (!$OO0O00O0000OOO0O00O0O00000O0O0O) {
        while (true) {
            $O00OO0OO00OO0OOOOO000O0000O00OO = $O000000O0O0O00O00O0OO0000O00O0O->GetPingbackDays();
            if ($O00OO0OO00OO0OOOOO000O0000O00OO == -1) {
                break;
            }
            if ($O00OO0OO00OO0OOOOO000O0000O00OO == 0) {
                $OOO00000000O000O00OO00OOO0O0000 = true;
                $O0O0O0O0000OOO0O00O0OOOOO00O00O = false;
                break;
            }
            $O00OO0OO00OO0OOOOO000O0000O00OO = $O00OO0OO00OO0OOOOO000O0000O00OO * 86400;
            if ($O0O0O00OOOOO0OOO0OO0O0O0000O0OO === false) {
                $OOO00000000O000O00OO00OOO0O0000 = true;
                $O0O00O0000OO0OOOO0OOO0OO00OO00O = time();
                break;
            }
            if (($O0O0O00OOOOO0OOO0OO0O0O0000O0OO + $O00OO0OO00OO0OOOOO000O0000O00OO) > time()) {
                break;
            }
            $OOO00OO00OOOOOO0O00O0OOOO0O00OO = create_user_dir(0, 3);
            if ($OOO00OO00OOOOOO0O00O0OOOO0O00OO === true) {
            } elseif ($OOO00OO00OOOOOO0O00O0OOOO0O00OO === false) {
                $O0O0O0O0000OOO0O00O0OOOOO00O00O = false;
            } else {
                $OOO00O00000O0OOOOO0000O000OOOOO = $O000000O0O0O00O00O0OO0000O00O0O->GetPingbackGrace();
                if ($O0O0O00OOOOO0OOO0OO0O0O0000O0OO + $OOO00O00000O0OOOOO0000O000OOOOO > time()) {
                    break;
                }
                $O0O0O0O0000OOO0O00O0OOOOO00O00O = false;
            }
            $O0O0O00OOOOO0OOO0OO0O0O0000O0OO = time();
            $OOO00000000O000O00OO00OOO0O0000 = true;
            break;
        }
    }
    if ($OOO00000000O000O00OO00OOO0O0000) {
        $O0O00O0000OO0OOOO0OOO0OO00OO00O = intval($O0O0O00OOOOO0OOO0OO0O0O0000O0OO);
        $O0O000O000O0OO0O0O0OOOOO0OOOO0O = (($O0O0O0O0000OOO0O00O0OOOOO00O00O ? base64_decode('MQ==') : "\x30") . base64_decode('Lg==') . $O0O00O0000OO0OOOO0OOO0OO00OO00O) ^ constant("\x53\x45\x4e\x44\x53\x54\x55\x44\x49\x4f\x5f\x4c\x49\x43\x45\x4e\x53\x45\x4b\x45\x59");
        @file_put_contents($O0000000OOOOOO0OO00OO0OO000O0OO, $O0O000O000O0OO0O0O0OOOOO0OOOO0O);
        $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O->Query(base64_decode('REVMRVRFIEZST00gW3xQUkVGSVh8XWpvYnMgV0hFUkUgam9idHlwZT0ndHJpZ2dlcmVtYWlsc19xdWV1ZSc='));
        $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O->Query(base64_decode('SU5TRVJUIElOVE8gW3xQUkVGSVh8XWpvYnMoam9idHlwZSwgam9ic3RhdHVzLCBqb2J0aW1lKSBWQUxVRVMgKCd0cmlnZ2VyZW1haWxzX3F1ZXVlJywgJw==') . ($O0O0O0O0000OOO0O00O0OOOOO00O00O ? "\x30" : "\x31") . "\x27\x2c\x20" . $O0O00O0000OO0OOOO0OOO0OO00OO00O . "\x29");
        $O0O000O000O0OO0O0O0OOOOO0OOOO0O = (string) (strval($O0O00O0000OO0OOOO0OOO0OO00OO00O . base64_decode('Lg==') . ($O0O0O0O0000OOO0O00O0OOOOO00O00O ? "\x31" : "\x30")));
        $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O->Query(base64_decode('REVMRVRFIEZST00gW3xQUkVGSVh8XWNvbmZpZ19zZXR0aW5ncyBXSEVSRSBhcmVhPSdERUZBVUxUX0VNQUlMU0laRSc='));
        $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O->Query("\x49\x4e\x53\x45\x52\x54\x20\x49\x4e\x54\x4f\x20\x5b\x7c\x50\x52\x45\x46\x49\x58\x7c\x5d\x63\x6f\x6e\x66\x69\x67\x5f\x73\x65\x74\x74\x69\x6e\x67\x73\x20\x28\x61\x72\x65\x61\x2c\x20\x61\x72\x65\x61\x76\x61\x6c\x75\x65\x29\x20\x56\x41\x4c\x55\x45\x53\x20\x28\x27\x44\x45\x46\x41\x55\x4c\x54\x5f\x45\x4d\x41\x49\x4c\x53\x49\x5a\x45\x27\x2c\x20\x27" . $O0OOOOO0O0OOOOOO00OOO0OOOO0OO0O->Quote($O0O000O000O0OO0O0O0OOOOO0OOOO0O) . "\x27\x29");
    }
    if ($O0O0000O0O0O00O00O0OOOO00O00OO0) {
        $O0OO00OO0OO00OOOOO0OOOO00OOOO0O = get_current_user_count();
        $O0O000O000O0OO0O0O0OOOOO0OOOO0O = array(
            "\x73\x74\x61\x74\x75\x73" => "\x4f\x4b",
            "\x61\x70\x70\x6c\x69\x63\x61\x74\x69\x6f\x6e\x5f\x73\x74\x61\x74\x65" => $O0O0O0O0000OOO0O00O0OOOOO00O00O,
            "\x61\x70\x70\x6c\x69\x63\x61\x74\x69\x6f\x6e\x5f\x6e\x6f\x72\x6d\x61\x6c\x75\x73\x65\x72" => $O0OO00OO0OO00OOOOO0OOOO00OOOO0O[base64_decode('bm9ybWFs')],
            "\x61\x70\x70\x6c\x69\x63\x61\x74\x69\x6f\x6e\x5f\x74\x72\x69\x61\x6c\x75\x73\x65\x72" => $O0OO00OO0OO00OOOOO0OOOO00OOOO0O[base64_decode('dHJpYWw=')]
        );
        $O0O000O000O0OO0O0O0OOOOO0OOOO0O = serialize($O0O000O000O0OO0O0O0OOOOO0OOOO0O);
        $O0O000O000O0OO0O0O0OOOOO0OOOO0O = $OO00O0O0OO00OOO0OOOO0OO00OO0OO0($O0O000O000O0OO0O0O0OOOOO0OOOO0O);
        $O0O000O000O0OO0O0O0OOOOO0OOOO0O = convert_uuencode($O0O000O000O0OO0O0O0OOOOO0OOOO0O);
        echo $O0O000O000O0OO0O0O0OOOOO0OOOO0O;
        exit();
    }
    if (defined("\x49\x45\x4d\x5f\x53\x59\x53\x54\x45\x4d\x5f\x41\x43\x54\x49\x56\x45")) {
        die(base64_decode('UGxlYXNlIGNvbnRhY3QgeW91ciBmcmllbmRseSBJbnRlcnNwaXJlIEN1c3RvbWVyIFNlcnZpY2UgZm9yIGFzc2lzdGFuY2Uu'));
    }
    define(base64_decode('SUVNX1NZU1RFTV9BQ1RJVkU='), 1);
}

function shutdown_and_cleanup()
{
    ss9O24kwehbehb();
}
  
function ss9O24kwehbehb()
{
	return '';
}
osdkfOljwe3i9kfdn93rjklwer93();
?>