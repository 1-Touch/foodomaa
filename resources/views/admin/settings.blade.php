@extends('admin.layouts.master')
@section("title") Settings - Dashboard
@endsection
@section('content')
<style>
    .disable-switch {
        opacity: 0.5;
        pointer-events: none;
    }
</style>

<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-circle-right2 mr-2"></i>
                <span class="font-weight-bold mr-2">SETTINGS</span>
            </h4>
        </div>
    </div>
</div>
<div class="content">
    <div class="col-md-12">
        <div class="card" style="min-height: 100vh;">
            <div class="card-body">
                <form action="{{ route('admin.saveSettings') }}" method="POST" enctype="multipart/form-data">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-lg">
                            <b><i class="icon-database-insert ml-1"></i></b>
                            Save Settings
                        </button>
                    </div>
                    <div class="d-lg-flex justify-content-lg-left">
                        <ul class="nav nav-pills flex-column mr-lg-3 wmin-lg-250 mb-lg-0">
                            <li class="nav-item">
                                <a href="#generalSettings" class="nav-link active" data-toggle="tab">
                                    <i class="icon-gear mr-2"></i>
                                    General
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#seoSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-zoomin3 mr-2"></i>
                                    SEO
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#designSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-brush mr-2"></i>
                                    Design
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#pushNotificationSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-bubble-dots4 mr-2"></i>
                                    Push Notifications
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#socialLoginSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-feed2 mr-2"></i>
                                    Social Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#mapSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-location4 mr-2"></i>
                                    Google Maps
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#paymentGatewaySettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-coin-dollar mr-2"></i>
                                    Payment Gateway
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#smsGatewaySettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-bubble-lines4 mr-2"></i>
                                    SMS Gateway
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#emailSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-envelop3 mr-2"></i>
                                    Email Settings 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#googleAnalyticsSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-graph mr-2"></i>
                                    Google Analytics
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#taxSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-percent mr-2"></i>
                                    Tax Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.translations') }}" class="nav-link">
                                    <i class="icon-font-size2 mr-2"></i>
                                    Translations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#customCSS" class="nav-link" data-toggle="tab">
                                    <i class="icon-file-css mr-2"></i>
                                    Custom CSS
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.updateFoodomaa') }}" class="nav-link">
                                    <i class="icon-feed spinner mr-2"></i>
                                    Update Foodomaa <span
                                        class="badge badge-flat border-grey-800 text-danger text-capitalize mr-1 float-right">NEW</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="#cacheSettings" class="nav-link" data-toggle="tab">
                                    <i class="icon-database-refresh mr-2"></i>
                                    Cache Settings <span
                                        class="badge badge-flat border-grey-800 text-danger text-capitalize mr-1 float-right">NEW</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#fixUpdateIssues" class="nav-link" data-toggle="tab">
                                    <i class="icon-magic-wand2 mr-2"></i>
                                    Fix Update Issues
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.modules') }}" class="nav-link">
                                    <i class="icon-puzzle mr-2"></i>
                                    Modules <span
                                        class="badge badge-flat border-grey-800 text-danger text-capitalize mr-1 float-right">NEW</span>
                                </a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" style="width: 100%; padding: 0 25px;">
                            <div class="tab-pane fade show active" id="generalSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Website's General Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Store Name:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="storeName"
                                            value="{{ config('settings.storeName') }}" placeholder="Enter Store Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Website URL:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="storeUrl"
                                            value="{{ config('settings.storeUrl') }}"
                                            placeholder="Enter website URL like: https://yourdomain.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">
                                        <strong>Application Time Zone:</strong>
                                    </label>
                                    <div class="col-lg-9">
                                        <select name="timezone" class="form-control form-control-lg timezone-select">
                                            <optgroup label="General">
                                                <option value="GMT">GMT timezone</option>
                                                <option value="UTC">UTC timezone</option>
                                            </optgroup>
                                            <optgroup label="Africa">
                                                <option value="Africa/Abidjan">(GMT/UTC + 00:00) Abidjan</option>
                                                <option value="Africa/Accra">(GMT/UTC + 00:00) Accra</option>
                                                <option value="Africa/Addis_Ababa">(GMT/UTC + 03:00) Addis Ababa
                                                </option>
                                                <option value="Africa/Algiers">(GMT/UTC + 01:00) Algiers</option>
                                                <option value="Africa/Asmara">(GMT/UTC + 03:00) Asmara</option>
                                                <option value="Africa/Bamako">(GMT/UTC + 00:00) Bamako</option>
                                                <option value="Africa/Bangui">(GMT/UTC + 01:00) Bangui</option>
                                                <option value="Africa/Banjul">(GMT/UTC + 00:00) Banjul</option>
                                                <option value="Africa/Bissau">(GMT/UTC + 00:00) Bissau</option>
                                                <option value="Africa/Blantyre">(GMT/UTC + 02:00) Blantyre</option>
                                                <option value="Africa/Brazzaville">(GMT/UTC + 01:00) Brazzaville
                                                </option>
                                                <option value="Africa/Bujumbura">(GMT/UTC + 02:00) Bujumbura</option>
                                                <option value="Africa/Cairo">(GMT/UTC + 02:00) Cairo</option>
                                                <option value="Africa/Casablanca">(GMT/UTC + 00:00) Casablanca</option>
                                                <option value="Africa/Ceuta">(GMT/UTC + 01:00) Ceuta</option>
                                                <option value="Africa/Conakry">(GMT/UTC + 00:00) Conakry</option>
                                                <option value="Africa/Dakar">(GMT/UTC + 00:00) Dakar</option>
                                                <option value="Africa/Dar_es_Salaam">(GMT/UTC + 03:00) Dar es Salaam
                                                </option>
                                                <option value="Africa/Djibouti">(GMT/UTC + 03:00) Djibouti</option>
                                                <option value="Africa/Douala">(GMT/UTC + 01:00) Douala</option>
                                                <option value="Africa/El_Aaiun">(GMT/UTC + 00:00) El Aaiun</option>
                                                <option value="Africa/Freetown">(GMT/UTC + 00:00) Freetown</option>
                                                <option value="Africa/Gaborone">(GMT/UTC + 02:00) Gaborone</option>
                                                <option value="Africa/Harare">(GMT/UTC + 02:00) Harare</option>
                                                <option value="Africa/Johannesburg">(GMT/UTC + 02:00) Johannesburg
                                                </option>
                                                <option value="Africa/Juba">(GMT/UTC + 03:00) Juba</option>
                                                <option value="Africa/Kampala">(GMT/UTC + 03:00) Kampala</option>
                                                <option value="Africa/Khartoum">(GMT/UTC + 03:00) Khartoum</option>
                                                <option value="Africa/Kigali">(GMT/UTC + 02:00) Kigali</option>
                                                <option value="Africa/Kinshasa">(GMT/UTC + 01:00) Kinshasa</option>
                                                <option value="Africa/Lagos">(GMT/UTC + 01:00) Lagos</option>
                                                <option value="Africa/Libreville">(GMT/UTC + 01:00) Libreville</option>
                                                <option value="Africa/Lome">(GMT/UTC + 00:00) Lome</option>
                                                <option value="Africa/Luanda">(GMT/UTC + 01:00) Luanda</option>
                                                <option value="Africa/Lubumbashi">(GMT/UTC + 02:00) Lubumbashi</option>
                                                <option value="Africa/Lusaka">(GMT/UTC + 02:00) Lusaka</option>
                                                <option value="Africa/Malabo">(GMT/UTC + 01:00) Malabo</option>
                                                <option value="Africa/Maputo">(GMT/UTC + 02:00) Maputo</option>
                                                <option value="Africa/Maseru">(GMT/UTC + 02:00) Maseru</option>
                                                <option value="Africa/Mbabane">(GMT/UTC + 02:00) Mbabane</option>
                                                <option value="Africa/Mogadishu">(GMT/UTC + 03:00) Mogadishu</option>
                                                <option value="Africa/Monrovia">(GMT/UTC + 00:00) Monrovia</option>
                                                <option value="Africa/Nairobi">(GMT/UTC + 03:00) Nairobi</option>
                                                <option value="Africa/Ndjamena">(GMT/UTC + 01:00) Ndjamena</option>
                                                <option value="Africa/Niamey">(GMT/UTC + 01:00) Niamey</option>
                                                <option value="Africa/Nouakchott">(GMT/UTC + 00:00) Nouakchott</option>
                                                <option value="Africa/Ouagadougou">(GMT/UTC + 00:00) Ouagadougou
                                                </option>
                                                <option value="Africa/Porto-Novo">(GMT/UTC + 01:00) Porto-Novo</option>
                                                <option value="Africa/Sao_Tome">(GMT/UTC + 00:00) Sao Tome</option>
                                                <option value="Africa/Tripoli">(GMT/UTC + 02:00) Tripoli</option>
                                                <option value="Africa/Tunis">(GMT/UTC + 01:00) Tunis</option>
                                                <option value="Africa/Windhoek">(GMT/UTC + 02:00) Windhoek</option>
                                            </optgroup>
                                            <optgroup label="America">
                                                <option value="America/Adak">(GMT/UTC - 10:00) Adak</option>
                                                <option value="America/Anchorage">(GMT/UTC - 09:00) Anchorage</option>
                                                <option value="America/Anguilla">(GMT/UTC - 04:00) Anguilla</option>
                                                <option value="America/Antigua">(GMT/UTC - 04:00) Antigua</option>
                                                <option value="America/Araguaina">(GMT/UTC - 03:00) Araguaina</option>
                                                <option value="America/Argentina/Buenos_Aires">(GMT/UTC - 03:00)
                                                    Argentina/Buenos Aires</option>
                                                <option value="America/Argentina/Catamarca">(GMT/UTC - 03:00)
                                                    Argentina/Catamarca</option>
                                                <option value="America/Argentina/Cordoba">(GMT/UTC - 03:00)
                                                    Argentina/Cordoba</option>
                                                <option value="America/Argentina/Jujuy">(GMT/UTC - 03:00)
                                                    Argentina/Jujuy</option>
                                                <option value="America/Argentina/La_Rioja">(GMT/UTC - 03:00)
                                                    Argentina/La Rioja</option>
                                                <option value="America/Argentina/Mendoza">(GMT/UTC - 03:00)
                                                    Argentina/Mendoza</option>
                                                <option value="America/Argentina/Rio_Gallegos">(GMT/UTC - 03:00)
                                                    Argentina/Rio Gallegos</option>
                                                <option value="America/Argentina/Salta">(GMT/UTC - 03:00)
                                                    Argentina/Salta</option>
                                                <option value="America/Argentina/San_Juan">(GMT/UTC - 03:00)
                                                    Argentina/San Juan</option>
                                                <option value="America/Argentina/San_Luis">(GMT/UTC - 03:00)
                                                    Argentina/San Luis</option>
                                                <option value="America/Argentina/Tucuman">(GMT/UTC - 03:00)
                                                    Argentina/Tucuman</option>
                                                <option value="America/Argentina/Ushuaia">(GMT/UTC - 03:00)
                                                    Argentina/Ushuaia</option>
                                                <option value="America/Aruba">(GMT/UTC - 04:00) Aruba</option>
                                                <option value="America/Asuncion">(GMT/UTC - 03:00) Asuncion</option>
                                                <option value="America/Atikokan">(GMT/UTC - 05:00) Atikokan</option>
                                                <option value="America/Bahia">(GMT/UTC - 03:00) Bahia</option>
                                                <option value="America/Bahia_Banderas">(GMT/UTC - 06:00) Bahia Banderas
                                                </option>
                                                <option value="America/Barbados">(GMT/UTC - 04:00) Barbados</option>
                                                <option value="America/Belem">(GMT/UTC - 03:00) Belem</option>
                                                <option value="America/Belize">(GMT/UTC - 06:00) Belize</option>
                                                <option value="America/Blanc-Sablon">(GMT/UTC - 04:00) Blanc-Sablon
                                                </option>
                                                <option value="America/Boa_Vista">(GMT/UTC - 04:00) Boa Vista</option>
                                                <option value="America/Bogota">(GMT/UTC - 05:00) Bogota</option>
                                                <option value="America/Boise">(GMT/UTC - 07:00) Boise</option>
                                                <option value="America/Cambridge_Bay">(GMT/UTC - 07:00) Cambridge Bay
                                                </option>
                                                <option value="America/Campo_Grande">(GMT/UTC - 03:00) Campo Grande
                                                </option>
                                                <option value="America/Cancun">(GMT/UTC - 05:00) Cancun</option>
                                                <option value="America/Caracas">(GMT/UTC - 04:30) Caracas</option>
                                                <option value="America/Cayenne">(GMT/UTC - 03:00) Cayenne</option>
                                                <option value="America/Cayman">(GMT/UTC - 05:00) Cayman</option>
                                                <option value="America/Chicago">(GMT/UTC - 06:00) Chicago</option>
                                                <option value="America/Chihuahua">(GMT/UTC - 07:00) Chihuahua</option>
                                                <option value="America/Costa_Rica">(GMT/UTC - 06:00) Costa Rica</option>
                                                <option value="America/Creston">(GMT/UTC - 07:00) Creston</option>
                                                <option value="America/Cuiaba">(GMT/UTC - 03:00) Cuiaba</option>
                                                <option value="America/Curacao">(GMT/UTC - 04:00) Curacao</option>
                                                <option value="America/Danmarkshavn">(GMT/UTC + 00:00) Danmarkshavn
                                                </option>
                                                <option value="America/Dawson">(GMT/UTC - 08:00) Dawson</option>
                                                <option value="America/Dawson_Creek">(GMT/UTC - 07:00) Dawson Creek
                                                </option>
                                                <option value="America/Denver">(GMT/UTC - 07:00) Denver</option>
                                                <option value="America/Detroit">(GMT/UTC - 05:00) Detroit</option>
                                                <option value="America/Dominica">(GMT/UTC - 04:00) Dominica</option>
                                                <option value="America/Edmonton">(GMT/UTC - 07:00) Edmonton</option>
                                                <option value="America/Eirunepe">(GMT/UTC - 05:00) Eirunepe</option>
                                                <option value="America/El_Salvador">(GMT/UTC - 06:00) El Salvador
                                                </option>
                                                <option value="America/Fort_Nelson">(GMT/UTC - 07:00) Fort Nelson
                                                </option>
                                                <option value="America/Fortaleza">(GMT/UTC - 03:00) Fortaleza</option>
                                                <option value="America/Glace_Bay">(GMT/UTC - 04:00) Glace Bay</option>
                                                <option value="America/Godthab">(GMT/UTC - 03:00) Godthab</option>
                                                <option value="America/Goose_Bay">(GMT/UTC - 04:00) Goose Bay</option>
                                                <option value="America/Grand_Turk">(GMT/UTC - 04:00) Grand Turk</option>
                                                <option value="America/Grenada">(GMT/UTC - 04:00) Grenada</option>
                                                <option value="America/Guadeloupe">(GMT/UTC - 04:00) Guadeloupe</option>
                                                <option value="America/Guatemala">(GMT/UTC - 06:00) Guatemala</option>
                                                <option value="America/Guayaquil">(GMT/UTC - 05:00) Guayaquil</option>
                                                <option value="America/Guyana">(GMT/UTC - 04:00) Guyana</option>
                                                <option value="America/Halifax">(GMT/UTC - 04:00) Halifax</option>
                                                <option value="America/Havana">(GMT/UTC - 05:00) Havana</option>
                                                <option value="America/Hermosillo">(GMT/UTC - 07:00) Hermosillo</option>
                                                <option value="America/Indiana/Indianapolis">(GMT/UTC - 05:00)
                                                    Indiana/Indianapolis</option>
                                                <option value="America/Indiana/Knox">(GMT/UTC - 06:00) Indiana/Knox
                                                </option>
                                                <option value="America/Indiana/Marengo">(GMT/UTC - 05:00)
                                                    Indiana/Marengo</option>
                                                <option value="America/Indiana/Petersburg">(GMT/UTC - 05:00)
                                                    Indiana/Petersburg</option>
                                                <option value="America/Indiana/Tell_City">(GMT/UTC - 06:00) Indiana/Tell
                                                    City</option>
                                                <option value="America/Indiana/Vevay">(GMT/UTC - 05:00) Indiana/Vevay
                                                </option>
                                                <option value="America/Indiana/Vincennes">(GMT/UTC - 05:00)
                                                    Indiana/Vincennes</option>
                                                <option value="America/Indiana/Winamac">(GMT/UTC - 05:00)
                                                    Indiana/Winamac</option>
                                                <option value="America/Inuvik">(GMT/UTC - 07:00) Inuvik</option>
                                                <option value="America/Iqaluit">(GMT/UTC - 05:00) Iqaluit</option>
                                                <option value="America/Jamaica">(GMT/UTC - 05:00) Jamaica</option>
                                                <option value="America/Juneau">(GMT/UTC - 09:00) Juneau</option>
                                                <option value="America/Kentucky/Louisville">(GMT/UTC - 05:00)
                                                    Kentucky/Louisville</option>
                                                <option value="America/Kentucky/Monticello">(GMT/UTC - 05:00)
                                                    Kentucky/Monticello</option>
                                                <option value="America/Kralendijk">(GMT/UTC - 04:00) Kralendijk</option>
                                                <option value="America/La_Paz">(GMT/UTC - 04:00) La Paz</option>
                                                <option value="America/Lima">(GMT/UTC - 05:00) Lima</option>
                                                <option value="America/Los_Angeles">(GMT/UTC - 08:00) Los Angeles
                                                </option>
                                                <option value="America/Lower_Princes">(GMT/UTC - 04:00) Lower Princes
                                                </option>
                                                <option value="America/Maceio">(GMT/UTC - 03:00) Maceio</option>
                                                <option value="America/Managua">(GMT/UTC - 06:00) Managua</option>
                                                <option value="America/Manaus">(GMT/UTC - 04:00) Manaus</option>
                                                <option value="America/Marigot">(GMT/UTC - 04:00) Marigot</option>
                                                <option value="America/Martinique">(GMT/UTC - 04:00) Martinique</option>
                                                <option value="America/Matamoros">(GMT/UTC - 06:00) Matamoros</option>
                                                <option value="America/Mazatlan">(GMT/UTC - 07:00) Mazatlan</option>
                                                <option value="America/Menominee">(GMT/UTC - 06:00) Menominee</option>
                                                <option value="America/Merida">(GMT/UTC - 06:00) Merida</option>
                                                <option value="America/Metlakatla">(GMT/UTC - 09:00) Metlakatla</option>
                                                <option value="America/Mexico_City">(GMT/UTC - 06:00) Mexico City
                                                </option>
                                                <option value="America/Miquelon">(GMT/UTC - 03:00) Miquelon</option>
                                                <option value="America/Moncton">(GMT/UTC - 04:00) Moncton</option>
                                                <option value="America/Monterrey">(GMT/UTC - 06:00) Monterrey</option>
                                                <option value="America/Montevideo">(GMT/UTC - 03:00) Montevideo</option>
                                                <option value="America/Montserrat">(GMT/UTC - 04:00) Montserrat</option>
                                                <option value="America/Nassau">(GMT/UTC - 05:00) Nassau</option>
                                                <option value="America/New_York">(GMT/UTC - 05:00) New York</option>
                                                <option value="America/Nipigon">(GMT/UTC - 05:00) Nipigon</option>
                                                <option value="America/Nome">(GMT/UTC - 09:00) Nome</option>
                                                <option value="America/Noronha">(GMT/UTC - 02:00) Noronha</option>
                                                <option value="America/North_Dakota/Beulah">(GMT/UTC - 06:00) North
                                                    Dakota/Beulah</option>
                                                <option value="America/North_Dakota/Center">(GMT/UTC - 06:00) North
                                                    Dakota/Center</option>
                                                <option value="America/North_Dakota/New_Salem">(GMT/UTC - 06:00) North
                                                    Dakota/New Salem</option>
                                                <option value="America/Ojinaga">(GMT/UTC - 07:00) Ojinaga</option>
                                                <option value="America/Panama">(GMT/UTC - 05:00) Panama</option>
                                                <option value="America/Pangnirtung">(GMT/UTC - 05:00) Pangnirtung
                                                </option>
                                                <option value="America/Paramaribo">(GMT/UTC - 03:00) Paramaribo</option>
                                                <option value="America/Phoenix">(GMT/UTC - 07:00) Phoenix</option>
                                                <option value="America/Port-au-Prince">(GMT/UTC - 05:00) Port-au-Prince
                                                </option>
                                                <option value="America/Port_of_Spain">(GMT/UTC - 04:00) Port of Spain
                                                </option>
                                                <option value="America/Porto_Velho">(GMT/UTC - 04:00) Porto Velho
                                                </option>
                                                <option value="America/Puerto_Rico">(GMT/UTC - 04:00) Puerto Rico
                                                </option>
                                                <option value="America/Rainy_River">(GMT/UTC - 06:00) Rainy River
                                                </option>
                                                <option value="America/Rankin_Inlet">(GMT/UTC - 06:00) Rankin Inlet
                                                </option>
                                                <option value="America/Recife">(GMT/UTC - 03:00) Recife</option>
                                                <option value="America/Regina">(GMT/UTC - 06:00) Regina</option>
                                                <option value="America/Resolute">(GMT/UTC - 06:00) Resolute</option>
                                                <option value="America/Rio_Branco">(GMT/UTC - 05:00) Rio Branco</option>
                                                <option value="America/Santarem">(GMT/UTC - 03:00) Santarem</option>
                                                <option value="America/Santiago">(GMT/UTC - 03:00) Santiago</option>
                                                <option value="America/Santo_Domingo">(GMT/UTC - 04:00) Santo Domingo
                                                </option>
                                                <option value="America/Sao_Paulo">(GMT/UTC - 02:00) Sao Paulo</option>
                                                <option value="America/Scoresbysund">(GMT/UTC - 01:00) Scoresbysund
                                                </option>
                                                <option value="America/Sitka">(GMT/UTC - 09:00) Sitka</option>
                                                <option value="America/St_Barthelemy">(GMT/UTC - 04:00) St. Barthelemy
                                                </option>
                                                <option value="America/St_Johns">(GMT/UTC - 03:30) St. Johns</option>
                                                <option value="America/St_Kitts">(GMT/UTC - 04:00) St. Kitts</option>
                                                <option value="America/St_Lucia">(GMT/UTC - 04:00) St. Lucia</option>
                                                <option value="America/St_Thomas">(GMT/UTC - 04:00) St. Thomas</option>
                                                <option value="America/St_Vincent">(GMT/UTC - 04:00) St. Vincent
                                                </option>
                                                <option value="America/Swift_Current">(GMT/UTC - 06:00) Swift Current
                                                </option>
                                                <option value="America/Tegucigalpa">(GMT/UTC - 06:00) Tegucigalpa
                                                </option>
                                                <option value="America/Thule">(GMT/UTC - 04:00) Thule</option>
                                                <option value="America/Thunder_Bay">(GMT/UTC - 05:00) Thunder Bay
                                                </option>
                                                <option value="America/Tijuana">(GMT/UTC - 08:00) Tijuana</option>
                                                <option value="America/Toronto">(GMT/UTC - 05:00) Toronto</option>
                                                <option value="America/Tortola">(GMT/UTC - 04:00) Tortola</option>
                                                <option value="America/Vancouver">(GMT/UTC - 08:00) Vancouver</option>
                                                <option value="America/Whitehorse">(GMT/UTC - 08:00) Whitehorse</option>
                                                <option value="America/Winnipeg">(GMT/UTC - 06:00) Winnipeg</option>
                                                <option value="America/Yakutat">(GMT/UTC - 09:00) Yakutat</option>
                                                <option value="America/Yellowknife">(GMT/UTC - 07:00) Yellowknife
                                                </option>
                                            </optgroup>
                                            <optgroup label="Antarctica">
                                                <option value="Antarctica/Casey">(GMT/UTC + 08:00) Casey</option>
                                                <option value="Antarctica/Davis">(GMT/UTC + 07:00) Davis</option>
                                                <option value="Antarctica/DumontDUrville">(GMT/UTC + 10:00)
                                                    DumontDUrville</option>
                                                <option value="Antarctica/Macquarie">(GMT/UTC + 11:00) Macquarie
                                                </option>
                                                <option value="Antarctica/Mawson">(GMT/UTC + 05:00) Mawson</option>
                                                <option value="Antarctica/McMurdo">(GMT/UTC + 13:00) McMurdo</option>
                                                <option value="Antarctica/Palmer">(GMT/UTC - 03:00) Palmer</option>
                                                <option value="Antarctica/Rothera">(GMT/UTC - 03:00) Rothera</option>
                                                <option value="Antarctica/Syowa">(GMT/UTC + 03:00) Syowa</option>
                                                <option value="Antarctica/Troll">(GMT/UTC + 00:00) Troll</option>
                                                <option value="Antarctica/Vostok">(GMT/UTC + 06:00) Vostok</option>
                                            </optgroup>
                                            <optgroup label="Arctic">
                                                <option value="Arctic/Longyearbyen">(GMT/UTC + 01:00) Longyearbyen
                                                </option>
                                            </optgroup>
                                            <optgroup label="Asia">
                                                <option value="Asia/Aden">(GMT/UTC + 03:00) Aden</option>
                                                <option value="Asia/Almaty">(GMT/UTC + 06:00) Almaty</option>
                                                <option value="Asia/Amman">(GMT/UTC + 02:00) Amman</option>
                                                <option value="Asia/Anadyr">(GMT/UTC + 12:00) Anadyr</option>
                                                <option value="Asia/Aqtau">(GMT/UTC + 05:00) Aqtau</option>
                                                <option value="Asia/Aqtobe">(GMT/UTC + 05:00) Aqtobe</option>
                                                <option value="Asia/Ashgabat">(GMT/UTC + 05:00) Ashgabat</option>
                                                <option value="Asia/Baghdad">(GMT/UTC + 03:00) Baghdad</option>
                                                <option value="Asia/Bahrain">(GMT/UTC + 03:00) Bahrain</option>
                                                <option value="Asia/Baku">(GMT/UTC + 04:00) Baku</option>
                                                <option value="Asia/Bangkok">(GMT/UTC + 07:00) Bangkok</option>
                                                <option value="Asia/Barnaul">(GMT/UTC + 07:00) Barnaul</option>
                                                <option value="Asia/Beirut">(GMT/UTC + 02:00) Beirut</option>
                                                <option value="Asia/Bishkek">(GMT/UTC + 06:00) Bishkek</option>
                                                <option value="Asia/Brunei">(GMT/UTC + 08:00) Brunei</option>
                                                <option value="Asia/Chita">(GMT/UTC + 09:00) Chita</option>
                                                <option value="Asia/Choibalsan">(GMT/UTC + 08:00) Choibalsan</option>
                                                <option value="Asia/Colombo">(GMT/UTC + 05:30) Colombo</option>
                                                <option value="Asia/Damascus">(GMT/UTC + 02:00) Damascus</option>
                                                <option value="Asia/Dhaka">(GMT/UTC + 06:00) Dhaka</option>
                                                <option value="Asia/Dili">(GMT/UTC + 09:00) Dili</option>
                                                <option value="Asia/Dubai">(GMT/UTC + 04:00) Dubai</option>
                                                <option value="Asia/Dushanbe">(GMT/UTC + 05:00) Dushanbe</option>
                                                <option value="Asia/Gaza">(GMT/UTC + 02:00) Gaza</option>
                                                <option value="Asia/Hebron">(GMT/UTC + 02:00) Hebron</option>
                                                <option value="Asia/Ho_Chi_Minh">(GMT/UTC + 07:00) Ho Chi Minh</option>
                                                <option value="Asia/Hong_Kong">(GMT/UTC + 08:00) Hong Kong</option>
                                                <option value="Asia/Hovd">(GMT/UTC + 07:00) Hovd</option>
                                                <option value="Asia/Irkutsk">(GMT/UTC + 08:00) Irkutsk</option>
                                                <option value="Asia/Jakarta">(GMT/UTC + 07:00) Jakarta</option>
                                                <option value="Asia/Jayapura">(GMT/UTC + 09:00) Jayapura</option>
                                                <option value="Asia/Jerusalem">(GMT/UTC + 02:00) Jerusalem</option>
                                                <option value="Asia/Kabul">(GMT/UTC + 04:30) Kabul</option>
                                                <option value="Asia/Kamchatka">(GMT/UTC + 12:00) Kamchatka</option>
                                                <option value="Asia/Karachi">(GMT/UTC + 05:00) Karachi</option>
                                                <option value="Asia/Kathmandu">(GMT/UTC + 05:45) Kathmandu</option>
                                                <option value="Asia/Khandyga">(GMT/UTC + 09:00) Khandyga</option>
                                                <option value="Asia/Kolkata">(GMT/UTC + 05:30) Kolkata</option>
                                                <option value="Asia/Krasnoyarsk">(GMT/UTC + 07:00) Krasnoyarsk</option>
                                                <option value="Asia/Kuala_Lumpur">(GMT/UTC + 08:00) Kuala Lumpur
                                                </option>
                                                <option value="Asia/Kuching">(GMT/UTC + 08:00) Kuching</option>
                                                <option value="Asia/Kuwait">(GMT/UTC + 03:00) Kuwait</option>
                                                <option value="Asia/Macau">(GMT/UTC + 08:00) Macau</option>
                                                <option value="Asia/Magadan">(GMT/UTC + 10:00) Magadan</option>
                                                <option value="Asia/Makassar">(GMT/UTC + 08:00) Makassar</option>
                                                <option value="Asia/Manila">(GMT/UTC + 08:00) Manila</option>
                                                <option value="Asia/Muscat">(GMT/UTC + 04:00) Muscat</option>
                                                <option value="Asia/Nicosia">(GMT/UTC + 02:00) Nicosia</option>
                                                <option value="Asia/Novokuznetsk">(GMT/UTC + 07:00) Novokuznetsk
                                                </option>
                                                <option value="Asia/Novosibirsk">(GMT/UTC + 06:00) Novosibirsk</option>
                                                <option value="Asia/Omsk">(GMT/UTC + 06:00) Omsk</option>
                                                <option value="Asia/Oral">(GMT/UTC + 05:00) Oral</option>
                                                <option value="Asia/Phnom_Penh">(GMT/UTC + 07:00) Phnom Penh</option>
                                                <option value="Asia/Pontianak">(GMT/UTC + 07:00) Pontianak</option>
                                                <option value="Asia/Pyongyang">(GMT/UTC + 08:30) Pyongyang</option>
                                                <option value="Asia/Qatar">(GMT/UTC + 03:00) Qatar</option>
                                                <option value="Asia/Qyzylorda">(GMT/UTC + 06:00) Qyzylorda</option>
                                                <option value="Asia/Rangoon">(GMT/UTC + 06:30) Rangoon</option>
                                                <option value="Asia/Riyadh">(GMT/UTC + 03:00) Riyadh</option>
                                                <option value="Asia/Sakhalin">(GMT/UTC + 11:00) Sakhalin</option>
                                                <option value="Asia/Samarkand">(GMT/UTC + 05:00) Samarkand</option>
                                                <option value="Asia/Seoul">(GMT/UTC + 09:00) Seoul</option>
                                                <option value="Asia/Shanghai">(GMT/UTC + 08:00) Shanghai</option>
                                                <option value="Asia/Singapore">(GMT/UTC + 08:00) Singapore</option>
                                                <option value="Asia/Srednekolymsk">(GMT/UTC + 11:00) Srednekolymsk
                                                </option>
                                                <option value="Asia/Taipei">(GMT/UTC + 08:00) Taipei</option>
                                                <option value="Asia/Tashkent">(GMT/UTC + 05:00) Tashkent</option>
                                                <option value="Asia/Tbilisi">(GMT/UTC + 04:00) Tbilisi</option>
                                                <option value="Asia/Tehran">(GMT/UTC + 03:30) Tehran</option>
                                                <option value="Asia/Thimphu">(GMT/UTC + 06:00) Thimphu</option>
                                                <option value="Asia/Tokyo">(GMT/UTC + 09:00) Tokyo</option>
                                                <option value="Asia/Ulaanbaatar">(GMT/UTC + 08:00) Ulaanbaatar</option>
                                                <option value="Asia/Urumqi">(GMT/UTC + 06:00) Urumqi</option>
                                                <option value="Asia/Ust-Nera">(GMT/UTC + 10:00) Ust-Nera</option>
                                                <option value="Asia/Vientiane">(GMT/UTC + 07:00) Vientiane</option>
                                                <option value="Asia/Vladivostok">(GMT/UTC + 10:00) Vladivostok</option>
                                                <option value="Asia/Yakutsk">(GMT/UTC + 09:00) Yakutsk</option>
                                                <option value="Asia/Yekaterinburg">(GMT/UTC + 05:00) Yekaterinburg
                                                </option>
                                                <option value="Asia/Yerevan">(GMT/UTC + 04:00) Yerevan</option>
                                            </optgroup>
                                            <optgroup label="Atlantic">
                                                <option value="Atlantic/Azores">(GMT/UTC - 01:00) Azores</option>
                                                <option value="Atlantic/Bermuda">(GMT/UTC - 04:00) Bermuda</option>
                                                <option value="Atlantic/Canary">(GMT/UTC + 00:00) Canary</option>
                                                <option value="Atlantic/Cape_Verde">(GMT/UTC - 01:00) Cape Verde
                                                </option>
                                                <option value="Atlantic/Faroe">(GMT/UTC + 00:00) Faroe</option>
                                                <option value="Atlantic/Madeira">(GMT/UTC + 00:00) Madeira</option>
                                                <option value="Atlantic/Reykjavik">(GMT/UTC + 00:00) Reykjavik</option>
                                                <option value="Atlantic/South_Georgia">(GMT/UTC - 02:00) South Georgia
                                                </option>
                                                <option value="Atlantic/St_Helena">(GMT/UTC + 00:00) St. Helena</option>
                                                <option value="Atlantic/Stanley">(GMT/UTC - 03:00) Stanley</option>
                                            </optgroup>
                                            <optgroup label="Australia">
                                                <option value="Australia/Adelaide">(GMT/UTC + 10:30) Adelaide</option>
                                                <option value="Australia/Brisbane">(GMT/UTC + 10:00) Brisbane</option>
                                                <option value="Australia/Broken_Hill">(GMT/UTC + 10:30) Broken Hill
                                                </option>
                                                <option value="Australia/Currie">(GMT/UTC + 11:00) Currie</option>
                                                <option value="Australia/Darwin">(GMT/UTC + 09:30) Darwin</option>
                                                <option value="Australia/Eucla">(GMT/UTC + 08:45) Eucla</option>
                                                <option value="Australia/Hobart">(GMT/UTC + 11:00) Hobart</option>
                                                <option value="Australia/Lindeman">(GMT/UTC + 10:00) Lindeman</option>
                                                <option value="Australia/Lord_Howe">(GMT/UTC + 11:00) Lord Howe</option>
                                                <option value="Australia/Melbourne">(GMT/UTC + 11:00) Melbourne</option>
                                                <option value="Australia/Perth">(GMT/UTC + 08:00) Perth</option>
                                                <option value="Australia/Sydney">(GMT/UTC + 11:00) Sydney</option>
                                            </optgroup>
                                            <optgroup label="Europe">
                                                <option value="Europe/Amsterdam">(GMT/UTC + 01:00) Amsterdam</option>
                                                <option value="Europe/Andorra">(GMT/UTC + 01:00) Andorra</option>
                                                <option value="Europe/Astrakhan">(GMT/UTC + 04:00) Astrakhan</option>
                                                <option value="Europe/Athens">(GMT/UTC + 02:00) Athens</option>
                                                <option value="Europe/Belgrade">(GMT/UTC + 01:00) Belgrade</option>
                                                <option value="Europe/Berlin">(GMT/UTC + 01:00) Berlin</option>
                                                <option value="Europe/Bratislava">(GMT/UTC + 01:00) Bratislava</option>
                                                <option value="Europe/Brussels">(GMT/UTC + 01:00) Brussels</option>
                                                <option value="Europe/Bucharest">(GMT/UTC + 02:00) Bucharest</option>
                                                <option value="Europe/Budapest">(GMT/UTC + 01:00) Budapest</option>
                                                <option value="Europe/Busingen">(GMT/UTC + 01:00) Busingen</option>
                                                <option value="Europe/Chisinau">(GMT/UTC + 02:00) Chisinau</option>
                                                <option value="Europe/Copenhagen">(GMT/UTC + 01:00) Copenhagen</option>
                                                <option value="Europe/Dublin">(GMT/UTC + 00:00) Dublin</option>
                                                <option value="Europe/Gibraltar">(GMT/UTC + 01:00) Gibraltar</option>
                                                <option value="Europe/Guernsey">(GMT/UTC + 00:00) Guernsey</option>
                                                <option value="Europe/Helsinki">(GMT/UTC + 02:00) Helsinki</option>
                                                <option value="Europe/Isle_of_Man">(GMT/UTC + 00:00) Isle of Man
                                                </option>
                                                <option value="Europe/Istanbul">(GMT/UTC + 02:00) Istanbul</option>
                                                <option value="Europe/Jersey">(GMT/UTC + 00:00) Jersey</option>
                                                <option value="Europe/Kaliningrad">(GMT/UTC + 02:00) Kaliningrad
                                                </option>
                                                <option value="Europe/Kiev">(GMT/UTC + 02:00) Kiev</option>
                                                <option value="Europe/Lisbon">(GMT/UTC + 00:00) Lisbon</option>
                                                <option value="Europe/Ljubljana">(GMT/UTC + 01:00) Ljubljana</option>
                                                <option value="Europe/London">(GMT/UTC + 00:00) London</option>
                                                <option value="Europe/Luxembourg">(GMT/UTC + 01:00) Luxembourg</option>
                                                <option value="Europe/Madrid">(GMT/UTC + 01:00) Madrid</option>
                                                <option value="Europe/Malta">(GMT/UTC + 01:00) Malta</option>
                                                <option value="Europe/Mariehamn">(GMT/UTC + 02:00) Mariehamn</option>
                                                <option value="Europe/Minsk">(GMT/UTC + 03:00) Minsk</option>
                                                <option value="Europe/Monaco">(GMT/UTC + 01:00) Monaco</option>
                                                <option value="Europe/Moscow">(GMT/UTC + 03:00) Moscow</option>
                                                <option value="Europe/Oslo">(GMT/UTC + 01:00) Oslo</option>
                                                <option value="Europe/Paris">(GMT/UTC + 01:00) Paris</option>
                                                <option value="Europe/Podgorica">(GMT/UTC + 01:00) Podgorica</option>
                                                <option value="Europe/Prague">(GMT/UTC + 01:00) Prague</option>
                                                <option value="Europe/Riga">(GMT/UTC + 02:00) Riga</option>
                                                <option value="Europe/Rome">(GMT/UTC + 01:00) Rome</option>
                                                <option value="Europe/Samara">(GMT/UTC + 04:00) Samara</option>
                                                <option value="Europe/San_Marino">(GMT/UTC + 01:00) San Marino</option>
                                                <option value="Europe/Sarajevo">(GMT/UTC + 01:00) Sarajevo</option>
                                                <option value="Europe/Simferopol">(GMT/UTC + 03:00) Simferopol</option>
                                                <option value="Europe/Skopje">(GMT/UTC + 01:00) Skopje</option>
                                                <option value="Europe/Sofia">(GMT/UTC + 02:00) Sofia</option>
                                                <option value="Europe/Stockholm">(GMT/UTC + 01:00) Stockholm</option>
                                                <option value="Europe/Tallinn">(GMT/UTC + 02:00) Tallinn</option>
                                                <option value="Europe/Tirane">(GMT/UTC + 01:00) Tirane</option>
                                                <option value="Europe/Ulyanovsk">(GMT/UTC + 04:00) Ulyanovsk</option>
                                                <option value="Europe/Uzhgorod">(GMT/UTC + 02:00) Uzhgorod</option>
                                                <option value="Europe/Vaduz">(GMT/UTC + 01:00) Vaduz</option>
                                                <option value="Europe/Vatican">(GMT/UTC + 01:00) Vatican</option>
                                                <option value="Europe/Vienna">(GMT/UTC + 01:00) Vienna</option>
                                                <option value="Europe/Vilnius">(GMT/UTC + 02:00) Vilnius</option>
                                                <option value="Europe/Volgograd">(GMT/UTC + 03:00) Volgograd</option>
                                                <option value="Europe/Warsaw">(GMT/UTC + 01:00) Warsaw</option>
                                                <option value="Europe/Zagreb">(GMT/UTC + 01:00) Zagreb</option>
                                                <option value="Europe/Zaporozhye">(GMT/UTC + 02:00) Zaporozhye</option>
                                                <option value="Europe/Zurich">(GMT/UTC + 01:00) Zurich</option>
                                            </optgroup>
                                            <optgroup label="Indian">
                                                <option value="Indian/Antananarivo">(GMT/UTC + 03:00) Antananarivo
                                                </option>
                                                <option value="Indian/Chagos">(GMT/UTC + 06:00) Chagos</option>
                                                <option value="Indian/Christmas">(GMT/UTC + 07:00) Christmas</option>
                                                <option value="Indian/Cocos">(GMT/UTC + 06:30) Cocos</option>
                                                <option value="Indian/Comoro">(GMT/UTC + 03:00) Comoro</option>
                                                <option value="Indian/Kerguelen">(GMT/UTC + 05:00) Kerguelen</option>
                                                <option value="Indian/Mahe">(GMT/UTC + 04:00) Mahe</option>
                                                <option value="Indian/Maldives">(GMT/UTC + 05:00) Maldives</option>
                                                <option value="Indian/Mauritius">(GMT/UTC + 04:00) Mauritius</option>
                                                <option value="Indian/Mayotte">(GMT/UTC + 03:00) Mayotte</option>
                                                <option value="Indian/Reunion">(GMT/UTC + 04:00) Reunion</option>
                                            </optgroup>
                                            <optgroup label="Pacific">
                                                <option value="Pacific/Apia">(GMT/UTC + 14:00) Apia</option>
                                                <option value="Pacific/Auckland">(GMT/UTC + 13:00) Auckland</option>
                                                <option value="Pacific/Bougainville">(GMT/UTC + 11:00) Bougainville
                                                </option>
                                                <option value="Pacific/Chatham">(GMT/UTC + 13:45) Chatham</option>
                                                <option value="Pacific/Chuuk">(GMT/UTC + 10:00) Chuuk</option>
                                                <option value="Pacific/Easter">(GMT/UTC - 05:00) Easter</option>
                                                <option value="Pacific/Efate">(GMT/UTC + 11:00) Efate</option>
                                                <option value="Pacific/Enderbury">(GMT/UTC + 13:00) Enderbury</option>
                                                <option value="Pacific/Fakaofo">(GMT/UTC + 13:00) Fakaofo</option>
                                                <option value="Pacific/Fiji">(GMT/UTC + 12:00) Fiji</option>
                                                <option value="Pacific/Funafuti">(GMT/UTC + 12:00) Funafuti</option>
                                                <option value="Pacific/Galapagos">(GMT/UTC - 06:00) Galapagos</option>
                                                <option value="Pacific/Gambier">(GMT/UTC - 09:00) Gambier</option>
                                                <option value="Pacific/Guadalcanal">(GMT/UTC + 11:00) Guadalcanal
                                                </option>
                                                <option value="Pacific/Guam">(GMT/UTC + 10:00) Guam</option>
                                                <option value="Pacific/Honolulu">(GMT/UTC - 10:00) Honolulu</option>
                                                <option value="Pacific/Johnston">(GMT/UTC - 10:00) Johnston</option>
                                                <option value="Pacific/Kiritimati">(GMT/UTC + 14:00) Kiritimati</option>
                                                <option value="Pacific/Kosrae">(GMT/UTC + 11:00) Kosrae</option>
                                                <option value="Pacific/Kwajalein">(GMT/UTC + 12:00) Kwajalein</option>
                                                <option value="Pacific/Majuro">(GMT/UTC + 12:00) Majuro</option>
                                                <option value="Pacific/Marquesas">(GMT/UTC - 09:30) Marquesas</option>
                                                <option value="Pacific/Midway">(GMT/UTC - 11:00) Midway</option>
                                                <option value="Pacific/Nauru">(GMT/UTC + 12:00) Nauru</option>
                                                <option value="Pacific/Niue">(GMT/UTC - 11:00) Niue</option>
                                                <option value="Pacific/Norfolk">(GMT/UTC + 11:00) Norfolk</option>
                                                <option value="Pacific/Noumea">(GMT/UTC + 11:00) Noumea</option>
                                                <option value="Pacific/Pago_Pago">(GMT/UTC - 11:00) Pago Pago</option>
                                                <option value="Pacific/Palau">(GMT/UTC + 09:00) Palau</option>
                                                <option value="Pacific/Pitcairn">(GMT/UTC - 08:00) Pitcairn</option>
                                                <option value="Pacific/Pohnpei">(GMT/UTC + 11:00) Pohnpei</option>
                                                <option value="Pacific/Port_Moresby">(GMT/UTC + 10:00) Port Moresby
                                                </option>
                                                <option value="Pacific/Rarotonga">(GMT/UTC - 10:00) Rarotonga</option>
                                                <option value="Pacific/Saipan">(GMT/UTC + 10:00) Saipan</option>
                                                <option value="Pacific/Tahiti">(GMT/UTC - 10:00) Tahiti</option>
                                                <option value="Pacific/Tarawa">(GMT/UTC + 12:00) Tarawa</option>
                                                <option value="Pacific/Tongatapu">(GMT/UTC + 13:00) Tongatapu</option>
                                                <option value="Pacific/Wake">(GMT/UTC + 12:00) Wake</option>
                                                <option value="Pacific/Wallis">(GMT/UTC + 12:00) Wallis</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Store Currency:</strong></label>
                                    <div class="col-lg-9">
                                        <select name="currencyId" class="form-control form-control-lg">
                                            <option value="AED" @if(config('settings.currencyId')=="AED" ) selected
                                                @endif>AED</option>
                                            <option value="AFN" @if(config('settings.currencyId')=="AFN" ) selected
                                                @endif>AFN</option>
                                            <option value="ALL" @if(config('settings.currencyId')=="ALL" ) selected
                                                @endif>ALL</option>
                                            <option value="AMD" @if(config('settings.currencyId')=="AMD" ) selected
                                                @endif>AMD</option>
                                            <option value="ANG" @if(config('settings.currencyId')=="ANG" ) selected
                                                @endif>ANG</option>
                                            <option value="ANG" @if(config('settings.currencyId')=="ANG" ) selected
                                                @endif>ANG</option>
                                            <option value="AOA" @if(config('settings.currencyId')=="AOA" ) selected
                                                @endif>AOA</option>
                                            <option value="ARS" @if(config('settings.currencyId')=="ARS" ) selected
                                                @endif>ARS</option>
                                            <option value="AUD" @if(config('settings.currencyId')=="AUD" ) selected
                                                @endif>AUD</option>
                                            <option value="AWG" @if(config('settings.currencyId')=="AWG" ) selected
                                                @endif>AWG</option>
                                            <option value="AZN" @if(config('settings.currencyId')=="AZN" ) selected
                                                @endif>AZN</option>
                                            <option value="BAM" @if(config('settings.currencyId')=="BAM" ) selected
                                                @endif>BAM</option>
                                            <option value="BBD" @if(config('settings.currencyId')=="BBD" ) selected
                                                @endif>BBD</option>
                                            <option value="BDT" @if(config('settings.currencyId')=="BDT" ) selected
                                                @endif>BDT</option>
                                            <option value="BGN" @if(config('settings.currencyId')=="BGN" ) selected
                                                @endif>BGN</option>
                                            <option value="BHD" @if(config('settings.currencyId')=="BHD" ) selected
                                                @endif>BHD</option>
                                            <option value="BIF" @if(config('settings.currencyId')=="BIF" ) selected
                                                @endif>BIF</option>
                                            <option value="BMD" @if(config('settings.currencyId')=="BMD" ) selected
                                                @endif>BMD</option>
                                            <option value="BND" @if(config('settings.currencyId')=="BND" ) selected
                                                @endif>BND</option>
                                            <option value="BOB" @if(config('settings.currencyId')=="BOB" ) selected
                                                @endif>BOB</option>
                                            <option value="BOV" @if(config('settings.currencyId')=="BOV" ) selected
                                                @endif>BOV</option>
                                            <option value="BRL" @if(config('settings.currencyId')=="BRL" ) selected
                                                @endif>BRL</option>
                                            <option value="BSD" @if(config('settings.currencyId')=="BSD" ) selected
                                                @endif>BSD</option>
                                            <option value="BTN" @if(config('settings.currencyId')=="BTN" ) selected
                                                @endif>BTN</option>
                                            <option value="BWP" @if(config('settings.currencyId')=="BWP" ) selected
                                                @endif>BWP</option>
                                            <option value="BYN" @if(config('settings.currencyId')=="BYN" ) selected
                                                @endif>BYN</option>
                                            <option value="BZD" @if(config('settings.currencyId')=="BZD" ) selected
                                                @endif>BZD</option>
                                            <option value="CAD" @if(config('settings.currencyId')=="CAD" ) selected
                                                @endif>CAD</option>
                                            <option value="CDF" @if(config('settings.currencyId')=="CDF" ) selected
                                                @endif>CDF</option>
                                            <option value="CHE" @if(config('settings.currencyId')=="CHE" ) selected
                                                @endif>CHE</option>
                                            <option value="CHF" @if(config('settings.currencyId')=="CHF" ) selected
                                                @endif>CHF</option>
                                            <option value="CHW" @if(config('settings.currencyId')=="CHW" ) selected
                                                @endif>CHW</option>
                                            <option value="CLF" @if(config('settings.currencyId')=="CLF" ) selected
                                                @endif>CLF</option>
                                            <option value="CLP" @if(config('settings.currencyId')=="CLP" ) selected
                                                @endif>CLP</option>
                                            <option value="CNY" @if(config('settings.currencyId')=="CNY" ) selected
                                                @endif>CNY</option>
                                            <option value="COP" @if(config('settings.currencyId')=="COP" ) selected
                                                @endif>COP</option>
                                            <option value="COU" @if(config('settings.currencyId')=="COU" ) selected
                                                @endif>COU</option>
                                            <option value="CRC" @if(config('settings.currencyId')=="CRC" ) selected
                                                @endif>CRC</option>
                                            <option value="CUC" @if(config('settings.currencyId')=="CUC" ) selected
                                                @endif>CUC</option>
                                            <option value="CVE" @if(config('settings.currencyId')=="CVE" ) selected
                                                @endif>CVE</option>
                                            <option value="CZK" @if(config('settings.currencyId')=="CZK" ) selected
                                                @endif>CZK</option>
                                            <option value="DJF" @if(config('settings.currencyId')=="DJF" ) selected
                                                @endif>DJF</option>
                                            <option value="DKK" @if(config('settings.currencyId')=="DKK" ) selected
                                                @endif>DKK</option>
                                            <option value="DOP" @if(config('settings.currencyId')=="DOP" ) selected
                                                @endif>DOP</option>
                                            <option value="DZD" @if(config('settings.currencyId')=="DZD" ) selected
                                                @endif>DZD</option>
                                            <option value="EGP" @if(config('settings.currencyId')=="EGP" ) selected
                                                @endif>EGP</option>
                                            <option value="ERN" @if(config('settings.currencyId')=="ERN" ) selected
                                                @endif>ERN</option>
                                            <option value="ETB" @if(config('settings.currencyId')=="ETB" ) selected
                                                @endif>ETB</option>
                                            <option value="EUR" @if(config('settings.currencyId')=="EUR" ) selected
                                                @endif>EUR</option>
                                            <option value="FJD" @if(config('settings.currencyId')=="FJD" ) selected
                                                @endif>FJD</option>
                                            <option value="FKP" @if(config('settings.currencyId')=="FKP" ) selected
                                                @endif>FKP</option>
                                            <option value="GBP" @if(config('settings.currencyId')=="GBP" ) selected
                                                @endif>GBP</option>
                                            <option value="GEL" @if(config('settings.currencyId')=="GEL" ) selected
                                                @endif>GEL</option>
                                            <option value="GHS" @if(config('settings.currencyId')=="GHS" ) selected
                                                @endif>GHS</option>
                                            <option value="GIP" @if(config('settings.currencyId')=="GIP" ) selected
                                                @endif>GIP</option>
                                            <option value="GMD" @if(config('settings.currencyId')=="GMD" ) selected
                                                @endif>GMD</option>
                                            <option value="GNF" @if(config('settings.currencyId')=="GNF" ) selected
                                                @endif>GNF</option>
                                            <option value="GTQ" @if(config('settings.currencyId')=="GTQ" ) selected
                                                @endif>GTQ</option>
                                            <option value="GYD" @if(config('settings.currencyId')=="GYD" ) selected
                                                @endif>GYD</option>
                                            <option value="HKD" @if(config('settings.currencyId')=="HKD" ) selected
                                                @endif>HKD</option>
                                            <option value="HNL" @if(config('settings.currencyId')=="HNL" ) selected
                                                @endif>HNL</option>
                                            <option value="HRK" @if(config('settings.currencyId')=="HRK" ) selected
                                                @endif>HRK</option>
                                            <option value="HTG" @if(config('settings.currencyId')=="HTG" ) selected
                                                @endif>HTG</option>
                                            <option value="HUF" @if(config('settings.currencyId')=="HUF" ) selected
                                                @endif>HUF</option>
                                            <option value="IDR" @if(config('settings.currencyId')=="IDR" ) selected
                                                @endif>IDR</option>
                                            <option value="ILS" @if(config('settings.currencyId')=="ILS" ) selected
                                                @endif>ILS</option>
                                            <option value="INR" @if(config('settings.currencyId')=="INR" ) selected
                                                @endif>INR</option>
                                            <option value="IQD" @if(config('settings.currencyId')=="IQD" ) selected
                                                @endif>IQD</option>
                                            <option value="IRR" @if(config('settings.currencyId')=="IRR" ) selected
                                                @endif>IRR</option>
                                            <option value="ISK" @if(config('settings.currencyId')=="ISK" ) selected
                                                @endif>ISK</option>
                                            <option value="JMD" @if(config('settings.currencyId')=="JMD" ) selected
                                                @endif>JMD</option>
                                            <option value="JOD" @if(config('settings.currencyId')=="JOD" ) selected
                                                @endif>JOD</option>
                                            <option value="JPY" @if(config('settings.currencyId')=="JPY" ) selected
                                                @endif>JPY</option>
                                            <option value="KES" @if(config('settings.currencyId')=="KES" ) selected
                                                @endif>KES</option>
                                            <option value="KGS" @if(config('settings.currencyId')=="KGS" ) selected
                                                @endif>KGS</option>
                                            <option value="KHR" @if(config('settings.currencyId')=="KHR" ) selected
                                                @endif>KHR</option>
                                            <option value="KMF" @if(config('settings.currencyId')=="KMF" ) selected
                                                @endif>KMF</option>
                                            <option value="KPW" @if(config('settings.currencyId')=="KPW" ) selected
                                                @endif>KPW</option>
                                            <option value="KRW" @if(config('settings.currencyId')=="KRW" ) selected
                                                @endif>KRW</option>
                                            <option value="KWD" @if(config('settings.currencyId')=="KWD" ) selected
                                                @endif>KWD</option>
                                            <option value="KYD" @if(config('settings.currencyId')=="KYD" ) selected
                                                @endif>KYD</option>
                                            <option value="KZT" @if(config('settings.currencyId')=="KZT" ) selected
                                                @endif>KZT</option>
                                            <option value="LAK" @if(config('settings.currencyId')=="LAK" ) selected
                                                @endif>LAK</option>
                                            <option value="LBP" @if(config('settings.currencyId')=="LBP" ) selected
                                                @endif>LBP</option>
                                            <option value="LKR" @if(config('settings.currencyId')=="LKR" ) selected
                                                @endif>LKR</option>
                                            <option value="LRD" @if(config('settings.currencyId')=="LRD" ) selected
                                                @endif>LRD</option>
                                            <option value="LSL" @if(config('settings.currencyId')=="LSL" ) selected
                                                @endif>LSL</option>
                                            <option value="LYD" @if(config('settings.currencyId')=="LYD" ) selected
                                                @endif>LYD</option>
                                            <option value="MAD" @if(config('settings.currencyId')=="MAD" ) selected
                                                @endif>MAD</option>
                                            <option value="MDL" @if(config('settings.currencyId')=="MDL" ) selected
                                                @endif>MDL</option>
                                            <option value="MGA" @if(config('settings.currencyId')=="MGA" ) selected
                                                @endif>MGA</option>
                                            <option value="MKD" @if(config('settings.currencyId')=="MKD" ) selected
                                                @endif>MKD</option>
                                            <option value="MMK" @if(config('settings.currencyId')=="MMK" ) selected
                                                @endif>MMK</option>
                                            <option value="MNT" @if(config('settings.currencyId')=="MNT" ) selected
                                                @endif>MNT</option>
                                            <option value="MOP" @if(config('settings.currencyId')=="MOP" ) selected
                                                @endif>MOP</option>
                                            <option value="MRU" @if(config('settings.currencyId')=="MRU" ) selected
                                                @endif>MRU</option>
                                            <option value="MUR" @if(config('settings.currencyId')=="MUR" ) selected
                                                @endif>MUR</option>
                                            <option value="MVR" @if(config('settings.currencyId')=="MVR" ) selected
                                                @endif>MVR</option>
                                            <option value="MWK" @if(config('settings.currencyId')=="MWK" ) selected
                                                @endif>MWK</option>
                                            <option value="MXN" @if(config('settings.currencyId')=="MXN" ) selected
                                                @endif>MXN</option>
                                            <option value="MXV" @if(config('settings.currencyId')=="MXV" ) selected
                                                @endif>MXV</option>
                                            <option value="MYR" @if(config('settings.currencyId')=="MYR" ) selected
                                                @endif>MYR</option>
                                            <option value="MZN" @if(config('settings.currencyId')=="MZN" ) selected
                                                @endif>MZN</option>
                                            <option value="NAD" @if(config('settings.currencyId')=="NAD" ) selected
                                                @endif>NAD</option>
                                            <option value="NGN" @if(config('settings.currencyId')=="NGN" ) selected
                                                @endif>NGN</option>
                                            <option value="NIO" @if(config('settings.currencyId')=="NIO" ) selected
                                                @endif>NIO</option>
                                            <option value="NOK" @if(config('settings.currencyId')=="NOK" ) selected
                                                @endif>NOK</option>
                                            <option value="NZD" @if(config('settings.currencyId')=="NZD" ) selected
                                                @endif>NZD</option>
                                            <option value="OMR" @if(config('settings.currencyId')=="OMR" ) selected
                                                @endif>OMR</option>
                                            <option value="PAB" @if(config('settings.currencyId')=="PAB" ) selected
                                                @endif>PAB</option>
                                            <option value="PEN" @if(config('settings.currencyId')=="PEN" ) selected
                                                @endif>PEN</option>
                                            <option value="PGK" @if(config('settings.currencyId')=="PGK" ) selected
                                                @endif>PGK</option>
                                            <option value="PHP" @if(config('settings.currencyId')=="PHP" ) selected
                                                @endif>PHP</option>
                                            <option value="PKR" @if(config('settings.currencyId')=="PKR" ) selected
                                                @endif>PKR</option>
                                            <option value="PLN" @if(config('settings.currencyId')=="PLN" ) selected
                                                @endif>PLN</option>
                                            <option value="PYG" @if(config('settings.currencyId')=="PYG" ) selected
                                                @endif>PYG</option>
                                            <option value="QAR" @if(config('settings.currencyId')=="QAR" ) selected
                                                @endif>QAR</option>
                                            <option value="RON" @if(config('settings.currencyId')=="RON" ) selected
                                                @endif>RON</option>
                                            <option value="RSD" @if(config('settings.currencyId')=="RSD" ) selected
                                                @endif>RSD</option>
                                            <option value="RUB" @if(config('settings.currencyId')=="RUB" ) selected
                                                @endif>RUB</option>
                                            <option value="RWF" @if(config('settings.currencyId')=="RWF" ) selected
                                                @endif>RWF</option>
                                            <option value="SAR" @if(config('settings.currencyId')=="SAR" ) selected
                                                @endif>SAR</option>
                                            <option value="SBD" @if(config('settings.currencyId')=="SBD" ) selected
                                                @endif>SBD</option>
                                            <option value="SCR" @if(config('settings.currencyId')=="SCR" ) selected
                                                @endif>SCR</option>
                                            <option value="SDG" @if(config('settings.currencyId')=="SDG" ) selected
                                                @endif>SDG</option>
                                            <option value="SEK" @if(config('settings.currencyId')=="SEK" ) selected
                                                @endif>SEK</option>
                                            <option value="SGD" @if(config('settings.currencyId')=="SGD" ) selected
                                                @endif>SGD</option>
                                            <option value="SHP" @if(config('settings.currencyId')=="SHP" ) selected
                                                @endif>SHP</option>
                                            <option value="SLL" @if(config('settings.currencyId')=="SLL" ) selected
                                                @endif>SLL</option>
                                            <option value="SOS" @if(config('settings.currencyId')=="SOS" ) selected
                                                @endif>SOS</option>
                                            <option value="SRD" @if(config('settings.currencyId')=="SRD" ) selected
                                                @endif>SRD</option>
                                            <option value="SSP" @if(config('settings.currencyId')=="SSP" ) selected
                                                @endif>SSP</option>
                                            <option value="STN" @if(config('settings.currencyId')=="STN" ) selected
                                                @endif>STN</option>
                                            <option value="SVC" @if(config('settings.currencyId')=="SVC" ) selected
                                                @endif>SVC</option>
                                            <option value="SYP" @if(config('settings.currencyId')=="SYP" ) selected
                                                @endif>SYP</option>
                                            <option value="SZL" @if(config('settings.currencyId')=="SZL" ) selected
                                                @endif>SZL</option>
                                            <option value="THB" @if(config('settings.currencyId')=="THB" ) selected
                                                @endif>THB</option>
                                            <option value="TJS" @if(config('settings.currencyId')=="TJS" ) selected
                                                @endif>TJS</option>
                                            <option value="TMT" @if(config('settings.currencyId')=="TMT" ) selected
                                                @endif>TMT</option>
                                            <option value="TND" @if(config('settings.currencyId')=="TND" ) selected
                                                @endif>TND</option>
                                            <option value="TOP" @if(config('settings.currencyId')=="TOP" ) selected
                                                @endif>TOP</option>
                                            <option value="TRY" @if(config('settings.currencyId')=="TRY" ) selected
                                                @endif>TRY</option>
                                            <option value="TTD" @if(config('settings.currencyId')=="TTD" ) selected
                                                @endif>TTD</option>
                                            <option value="TWD" @if(config('settings.currencyId')=="TWD" ) selected
                                                @endif>TWD</option>
                                            <option value="TZS" @if(config('settings.currencyId')=="TZS" ) selected
                                                @endif>TZS</option>
                                            <option value="UAH" @if(config('settings.currencyId')=="UAH" ) selected
                                                @endif>UAH</option>
                                            <option value="UGX" @if(config('settings.currencyId')=="UGX" ) selected
                                                @endif>UGX</option>
                                            <option value="USD" @if(config('settings.currencyId')=="USD" ) selected
                                                @endif>USD</option>
                                            <option value="USN" @if(config('settings.currencyId')=="USN" ) selected
                                                @endif>USN</option>
                                            <option value="UYI" @if(config('settings.currencyId')=="UYI" ) selected
                                                @endif>UYI</option>
                                            <option value="UYU" @if(config('settings.currencyId')=="UYU" ) selected
                                                @endif>UYU</option>
                                            <option value="UZS" @if(config('settings.currencyId')=="UZS" ) selected
                                                @endif>UZS</option>
                                            <option value="VEF" @if(config('settings.currencyId')=="VEF" ) selected
                                                @endif>VEF</option>
                                            <option value="VND" @if(config('settings.currencyId')=="VND" ) selected
                                                @endif>VND</option>
                                            <option value="VUV" @if(config('settings.currencyId')=="VUV" ) selected
                                                @endif>VUV</option>
                                            <option value="WST" @if(config('settings.currencyId')=="WST" ) selected
                                                @endif>WST</option>
                                            <option value="XAF" @if(config('settings.currencyId')=="XAF" ) selected
                                                @endif>XAF</option>
                                            <option value="XCD" @if(config('settings.currencyId')=="XCD" ) selected
                                                @endif>XCD</option>
                                            <option value="XDR" @if(config('settings.currencyId')=="XDR" ) selected
                                                @endif>XDR</option>
                                            <option value="XOF" @if(config('settings.currencyId')=="XOF" ) selected
                                                @endif>XOF</option>
                                            <option value="XPF" @if(config('settings.currencyId')=="XPF" ) selected
                                                @endif>XPF</option>
                                            <option value="XSU" @if(config('settings.currencyId')=="XSU" ) selected
                                                @endif>XSU</option>
                                            <option value="XUA" @if(config('settings.currencyId')=="XUA" ) selected
                                                @endif>XUA</option>
                                            <option value="YER" @if(config('settings.currencyId')=="YER" ) selected
                                                @endif>YER</option>
                                            <option value="ZAR" @if(config('settings.currencyId')=="ZAR" ) selected
                                                @endif>ZAR</option>
                                            <option value="ZMW" @if(config('settings.currencyId')=="ZMW" ) selected
                                                @endif>ZMW</option>
                                            <option value="ZWL" @if(config('settings.currencyId')=="ZWL" ) selected
                                                @endif>ZWL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Currency Symbol:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="currencyFormat"
                                            value="{{ config('settings.currencyFormat') }}"
                                            placeholder="Currency Symbol like  $ or €">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Currency Symbol Alignment</strong></label>
                                    <div class="col-lg-9">
                                        <select name="currencySymbolAlign" class="form-control form-control-lg">
                                            <option value="left" @if(config('settings.currencySymbolAlign')=="left" ) selected
                                                @endif>Left
                                            </option>
                                            <option value="right" @if(config('settings.currencySymbolAlign')=="right" ) selected
                                                @endif>Right
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Wallet Name:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="walletName"
                                            value="{{ config('settings.walletName') }}"
                                            placeholder="Enter the name of your wallet system (Eg: Coins, PiggyBank)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Show Promo Slider? </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.showPromoSlider')=="true" ) checked="checked"
                                                    @endif name="showPromoSlider">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Show Veg/Non-Veg Badge?
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.showVegNonVegBadge')=="true" )
                                                    checked="checked" @endif name="showVegNonVegBadge">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Beautify Date/Time
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.showFromNowDate')=="true" )
                                                    checked="checked" @endif name="showFromNowDate">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Show GDPR Checkbox? </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.showGdpr')=="true" ) checked="checked" @endif
                                                    name="showGdpr">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Self Pickup? </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enSPU')=="true" ) checked="checked" @endif
                                                    name="enSPU">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Delivery Pin?
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enableDeliveryPin')=="true" ) checked="checked"
                                                    @endif name="enableDeliveryPin">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Minimum Payout for Restaurant in
                                            {{ config('settings.currencyFormat') }}: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg min-payout" name="minPayout"
                                            value="{{ config('settings.minPayout') }}"
                                            placeholder="Minimum Payout for Restaurant in {{ config('settings.currencyFormat') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Max Time for Accept Order:
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg threshold-time"
                                            name="restaurantAcceptTimeThreshold"
                                            value="{{ config('settings.restaurantAcceptTimeThreshold') }}">
                                        <span class="help-text text-muted">Maximum time in minutes after which admin
                                            gets notification in the orders page that the restaurant owner has not
                                            accepted the order.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Max Time for Accept Delivery:
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg threshold-time"
                                            name="deliveryAcceptTimeThreshold"
                                            value="{{ config('settings.deliveryAcceptTimeThreshold') }}">
                                        <span class="help-text text-muted">Maximum time in minutes after which admin
                                            gets notification in the orders page that the delivery guy has not accepted
                                            the order.</span>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Default Country Code on Phone field:
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="phoneCountryCode"
                                            value="{{ config('settings.phoneCountryCode') }}"
                                            placeholder="Default Country Code on Phone field (Leave empty if not required)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Hide Item Price when Zero?
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.hidePriceWhenZero')=="true" ) checked="checked"
                                                    @endif name="hidePriceWhenZero">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Show Product Discount Percentage?
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.showPercentageDiscount')=="true" )
                                                    checked="checked" @endif name="showPercentageDiscount">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Delivery Guy's Earnings?
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enableDeliveryGuyEarning')=="true" )
                                                    checked="checked" @endif name="enableDeliveryGuyEarning">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Delivery Guy's Earning Form?
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <select name="deliveryGuyCommissionFrom" class="form-control">
                                                    <option value="FULLORDER"
                                                        @if(config('settings.deliveryGuyCommissionFrom')=="FULLORDER" )
                                                        selected="selected" @endif>Commission from Full Order Value
                                                    </option>
                                                    <option value="DELIVERYCHARGE"
                                                        @if(config('settings.deliveryGuyCommissionFrom')=="DELIVERYCHARGE"
                                                        ) selected="selected" @endif>Commission from Delivery Charge
                                                        Value</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-top: 3px dashed rgba(103, 58, 183, 0.20);">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Development Mode?
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enDevMode')=="true" ) checked="checked" @endif
                                                    name="enDevMode">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seoSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    SEO Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Meta Title: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="seoMetaTitle"
                                            value="{{ config('settings.seoMetaTitle') }}" placeholder="Meta Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Meta Description: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg"
                                            name="seoMetaDescription"
                                            value="{{ config('settings.seoMetaDescription') }}"
                                            placeholder="Meta Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Open Graph Title: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="seoOgTitle"
                                            value="{{ config('settings.seoOgTitle') }}" placeholder="Open Graph Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Open Graph Description:
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="seoOgDescription"
                                            value="{{ config('settings.seoOgDescription') }}"
                                            placeholder="Open Graph Meta Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if(config('settings.seoOgImage') !== NULL)
                                    <div class="col-lg-9 offset-lg-3">
                                        <img src="{{ substr(url('/'), 0, strrpos(url('/'), '/')) }}/assets/img/social/{{ config('settings.seoOgImage') }}"
                                            alt="Open Graph Image" class="img-fluid mb-2" style="width: 30%;">
                                    </div>
                                    @endif
                                    <label class="col-lg-3 col-form-label"><strong>Open Graph Image: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control-uniform" name="seoOgImage" data-fouc>
                                        <span class="help-text text-muted">Image size 1200x630 </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Twitter Cards Title:
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="seoTwitterTitle"
                                            value="{{ config('settings.seoTwitterTitle') }}"
                                            placeholder="Twitter Cards Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Twitter Cards
                                            Description</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg"
                                            name="seoTwitterDescription"
                                            value="{{ config('settings.seoTwitterDescription') }}"
                                            placeholder="Twitter Cards Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if(config('settings.seoTwitterImage') !== NULL)
                                    <div class="col-lg-9 offset-lg-3">
                                        <img src="{{ substr(url('/'), 0, strrpos(url('/'), '/')) }}/assets/img/social/{{ config('settings.seoTwitterImage') }}"
                                            alt="Twitter Image" class="img-fluid mb-2" style="width: 30%;">
                                    </div>
                                    @endif
                                    <label class="col-lg-3 col-form-label"><strong>Twitter Cards Image:
                                        </strong></label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control-uniform" name="seoTwitterImage"
                                            data-fouc>
                                        <span class="help-text text-muted">Image size 600x335</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="designSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Design Settings
                                </legend>
                                <div class="form-group row">
                                    @if(config('settings.storeLogo') !== NULL)
                                    <div class="col-lg-9 offset-lg-3">
                                        <img src="{{ substr(url('/'), 0, strrpos(url('/'), '/')) }}/assets/img/logos/{{ config('settings.storeLogo') }}"
                                            alt="logo" class="img-fluid mb-2" style="width: 135px;">
                                    </div>
                                    @endif
                                    <label class="col-lg-3 col-form-label"><strong>Logo: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control-uniform" name="logo" data-fouc>
                                        <span class="help-text text-muted">Image size 320x89</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if(config('settings.favicon-32x32') !== NULL)
                                    <div class="col-lg-9 offset-lg-3">
                                        <img src="{{ substr(url('/'), 0, strrpos(url('/'), '/')) }}/assets/img/favicons/{{ config('settings.favicon-96x96') }}"
                                            alt="favicon-96x96" class="img-fluid mb-2" style="width: 70px;">
                                    </div>
                                    @endif
                                    <label class="col-lg-3 col-form-label"><strong>Favicon: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control-uniform" name="favicon" data-fouc>
                                        <span class="help-text text-muted">Square Image of min size: 512x512</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if(config('settings.splashLogo') !== NULL)
                                    <div class="col-lg-9 offset-lg-3">
                                        <img src="{{ substr(url('/'), 0, strrpos(url('/'), '/')) }}/assets/img/splash/{{ config('settings.splashLogo') }}"
                                            alt="splash screen" class="img-fluid mb-2" style="width: 30%;">
                                    </div>
                                    @endif
                                    <label class="col-lg-3 col-form-label"><strong>Splash Screen: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control-uniform" name="splashLogo" data-fouc>
                                        <span class="help-text text-muted">Image size 480x853</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if(config('settings.firstScreenHeroImage') !== NULL)
                                    <div class="col-lg-9 offset-lg-3">
                                        <img src="{{ substr(url('/'), 0, strrpos(url('/'), '/')) }}/{{ config('settings.firstScreenHeroImage') }}"
                                            alt="Hero Image" class="img-fluid mb-2" style="width: 30%;">
                                    </div>
                                    @endif
                                    <label class="col-lg-3 col-form-label"><strong>Hero Image: </strong></label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control-uniform" name="firstScreenHeroImage"
                                            data-fouc>
                                        <span class="help-text text-muted">Image size 592x640</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Store Color:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control colorpicker-show-input" name="storeColor"
                                            data-preferred-format="rgb" value="{{ config('settings.storeColor') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Cart Background
                                            Color:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control colorpicker-show-input"
                                            name="cartColorBg" data-preferred-format="rgb"
                                            value="{{ config('settings.cartColorBg') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Cart Text Color:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control colorpicker-show-input"
                                            name="cartColorText" data-preferred-format="rgb"
                                            value="{{ config('settings.cartColorText') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>New Item Badge
                                            Color:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control colorpicker-show-input"
                                            name="newBadgeColor" data-preferred-format="rgb"
                                            value="{{ config('settings.newBadgeColor') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Popular Item Badge
                                            Color:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control colorpicker-show-input"
                                            name="popularBadgeColor" data-preferred-format="rgb"
                                            value="{{ config('settings.popularBadgeColor') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Recommended Item Badge
                                            Color:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control colorpicker-show-input"
                                            name="recommendedBadgeColor" data-preferred-format="rgb"
                                            value="{{ config('settings.recommendedBadgeColor') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pushNotificationSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Push Notification Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Push
                                            Notifications</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enablePushNotification')=="true" )
                                                    checked="checked" @endif name="enablePushNotification">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Push Notifications for Order
                                            Updates</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enablePushNotificationOrders')=="true" )
                                                    checked="checked" @endif name="enablePushNotificationOrders">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Firebase Sender ID:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="firebaseSenderId"
                                            value="{{ config('settings.firebaseSenderId') }}"
                                            placeholder="Enter Firebase Sender ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Firebase Web Push
                                            Certificate:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="firebasePublic"
                                            value="{{ config('settings.firebasePublic') }}"
                                            placeholder="Enter Firebase Public Key (Certificate)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Firebase Server Key:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="firebaseSecret"
                                            value="{{ config('settings.firebaseSecret') }}"
                                            placeholder="Enter Firebase Secret">
                                        <span class="help-text text-muted"><a
                                                href="https://stackcanyon.com/docs/foodomaa/admin-push-notifications"
                                                target="_blank">How to configure Push Notifiactions? </a></span>
                                        <p class="text-danger"><strong>Note: </strong> Legacy server key cannot be used.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Firebase SDK Snippet</strong></label>
                                    <div class="col-lg-9">
                                        <textarea rows="10" class="form-control form-control-lg"
                                            name="firebaseSDKSnippet"
                                            placeholder="Paste your Firebase SDK Snippet Config">{{ config('settings.firebaseSDKSnippet') }}</textarea>
                                        <span class="help-text text-muted">This is to configure Push Notifications for
                                            Restaurant Owner <br><a
                                                href="https://stackcanyon.com/docs/foodomaa/admin-push-notifications"
                                                target="_blank">How to setup Firebase SDK? </a></span>
                                    </div>
                                </div>
                                <br>
                                <hr><a href="https://firebase.google.com/" target="_blank" rel="nofollow">Click Here</a>
                                to get your Firebase Credentials. <br>
                            </div>
                            <div class="tab-pane fade" id="socialLoginSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Social Login Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Facebook
                                            Login</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enableFacebookLogin')=="true" )
                                                    checked="checked" @endif name="enableFacebookLogin">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Facebook App ID:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="facebookAppId"
                                            value="{{ config('settings.facebookAppId') }}"
                                            placeholder="Enter Facebook App ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Facebook Login Button
                                            Text:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg"
                                            name="facebookLoginButtonText"
                                            value="{{ config('settings.facebookLoginButtonText') }}"
                                            placeholder="Facebook Login Button Text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Google Login</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enableGoogleLogin')=="true" ) checked="checked"
                                                    @endif name="enableGoogleLogin">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Google App ID:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="googleAppId"
                                            value="{{ config('settings.googleAppId') }}"
                                            placeholder="Enter Google App ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Google Login Button
                                            Text:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg"
                                            name="googleLoginButtonText"
                                            value="{{ config('settings.googleLoginButtonText') }}"
                                            placeholder="Google Login Button Text">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="mapSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Google Map Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Show Map on Order Tracking Page?</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.showMap')=="true" ) checked="checked" @endif
                                                    name="showMap">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Google Map API Key: </strong> <br>
                                        (with HTTP Restriction)</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="googleApiKey"
                                            value="{{ config('settings.googleApiKey') }}"
                                            placeholder="Google Map API Key which has HTTP Restrictions">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Google Map API Key: </strong> <br>
                                        (with IP Restriction)</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="googleApiKeyIP"
                                            value="{{ config('settings.googleApiKeyIP') }}"
                                            placeholder="Google Map API Key which has IP Restrictions">
                                    </div>
                                </div>
                                <hr><a href="https://stackcanyon.com/docs/foodomaa/admin-google-maps-api" target="_blank" rel="nofollow">Click Here</a>
                                to learn how to setup Google API Keys.<br>
                            </div>
                            <div class="tab-pane fade" id="paymentGatewaySettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Payment Gateway Settings
                                </legend>
                                @php
                                $activePaymentGatewayCount = count($activePaymentGateways);
                                @endphp
                                @foreach($paymentGateways as $paymentGateway)
                                <div class="form-group row" id="paymentGatewaysData">
                                    <label class="col-lg-5 col-form-label"><strong>{{ $paymentGateway->name }}
                                        </strong>({{ $paymentGateway->description }})</label>
                                    <div class="col-lg-6 mt-2">
                                        <label>
                                            <input value="{{ $paymentGateway->id }}" type="checkbox"
                                                class="switchery-primary payment-gateway-switch"
                                                @if($paymentGateway->is_active && $activePaymentGatewayCount == 1)
                                            checked="checked"
                                            disabled="disabled"
                                            @endif
                                            @if($paymentGateway->is_active)
                                            checked="checked"
                                            @endif
                                            name="{{ $paymentGateway->name }}">
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                                <hr>
                                <h2>Stripe</h2>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Stripe Public Key:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="stripePublicKey"
                                            value="{{ config('settings.stripePublicKey') }}"
                                            placeholder="Stripe Public Key (Leave blank if not using Stripe)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Stripe Secret Key:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="stripeSecretKey"
                                            value="{{ config('settings.stripeSecretKey') }}"
                                            placeholder="Stripe Secret Key (Leave blank if not using Stripe)">
                                    </div>
                                </div>
                                <hr>
                                <h2>PayPal</h2>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Paypal Environment:</strong></label>
                                    <div class="col-lg-9">
                                        <select name="paypalEnv" class="form-control form-control-lg">
                                            <option value="sandbox" @if(config('settings.paypalEnv')=="sandbox" )
                                                selected @endif>Sandbox (Testing)</option>
                                            <option value="production" @if(config('settings.paypalEnv')=="production" )
                                                selected @endif>Production (Live)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Paypal Sandbox Key:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="paypalSandboxKey"
                                            value="{{ config('settings.paypalSandboxKey') }}"
                                            placeholder="Paypal Sandbox Client Key (Leave blank if not using PayPal)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Paypal Production
                                            Key:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg"
                                            name="paypalProductionKey"
                                            value="{{ config('settings.paypalProductionKey') }}"
                                            placeholder="Paypal Production Client Key (Leave blank if not using PayPal)">
                                    </div>
                                </div>
                                <hr>
                                <h2>PayStack</h2>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>PayStack Public Key:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="paystackPublicKey"
                                            value="{{ config('settings.paystackPublicKey') }}"
                                            placeholder="PayStack Public Key (Leave blank if not using PayStack)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>PayStack Private
                                            Key:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg"
                                            name="paystackPrivateKey"
                                            value="{{ config('settings.paystackPrivateKey') }}"
                                            placeholder="PayStack Private Key (Leave blank if not using PayStack)">
                                    </div>
                                </div>
                                <hr>
                                <h2>Razorpay</h2>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Razorpay Key Id:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="razorpayKeyId"
                                            value="{{ config('settings.razorpayKeyId') }}"
                                            placeholder="Razorpay Key Id (Leave blank if not using Razorpay)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Razorpay Secret Key:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="razorpayKeySecret"
                                            value="{{ config('settings.razorpayKeySecret') }}"
                                            placeholder="Razorpay Secret Key (Leave blank if not using Razorpay)">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="smsGatewaySettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    SMS Gateway Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>OTP Verficiation on
                                            Registration</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enSOV')=="true" ) checked="checked" @endif
                                                    name="enSOV">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Twilio SID:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="twilioSid"
                                            value="{{ config('settings.twilioSid') }}" placeholder="Twilio SID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Twilio Access Token:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="twilioAccessToken"
                                            value="{{ config('settings.twilioAccessToken') }}"
                                            placeholder="Twilio Access Token">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Twilio Service ID:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="twilioServiceId"
                                            value="{{ config('settings.twilioServiceId') }}"
                                            placeholder="Twilio Service ID">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="emailSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Email Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Password Reset
                                            Email?</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enPassResetEmail')=="true" ) checked="checked"
                                                    @endif name="enPassResetEmail">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Host</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="mail_host"
                                            value="{{ config('settings.mail_host') }}" placeholder="Mail Server Host">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Port</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="mail_port"
                                            value="{{ config('settings.mail_port') }}" placeholder="Mail Server Port">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Username</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="mail_username"
                                            value="{{ config('settings.mail_username') }}"
                                            placeholder="Mail Server Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Password</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="mail_password"
                                            value="{{ config('settings.mail_password') }}"
                                            placeholder="Mail Server Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Encryption</strong></label>
                                    <div class="col-lg-9">
                                        <select name="mail_encryption" class="form-control form-control-lg">
                                            <option @if(config('settings.mail_encryption')=="SSL" ) selected @endif
                                                value="SSL">SSL</option>
                                            <option @if(config('settings.mail_encryption')=="TLS" ) selected @endif
                                                value="TLS">TLS</option>
                                            <option @if(config('settings.mail_encryption')=="null" ) selected @endif
                                                value="null">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <p><strong class="text-danger">IMPORTANT:</strong> Send a test mail to your email
                                        address before you enable the Password Reset Functionality</p> <button
                                        type="button" class="btn btn-primary btn-md" id="toggleSendTestEmail"> Send Test
                                        Email</button>
                                    <div id="sendTestEmailBlock" style="display: none;">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control form-control-lg" id="testEmail"
                                                    placeholder="Enter your Email Address">
                                            </div>
                                            <button type="button"
                                                class="btn btn-primary btn-labeled btn-labeled-left btn-md"
                                                id="sendTestEmailNow">
                                                <b><i class="icon-mail-read ml-1"></i></b>
                                                Send Test Email
                                                <i class="icon-spinner10 spinner ml-1" id="testMailSpinner"
                                                    style="display: none;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="mt-5">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label"><strong>Send Emails From "Email"</strong></label>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control form-control-lg" name="sendEmailFromEmailAddress"
                                                value="{{ config('settings.sendEmailFromEmailAddress') }}"
                                                placeholder="Enter an email like do-not-reply@mywebsite.com">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label"><strong>Send Emails From "Name"</strong></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control form-control-lg" name="sendEmailFromEmailName"
                                                value="{{ config('settings.sendEmailFromEmailName') }}"
                                                placeholder="Enter the email address name (Ex: Your website name)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label"><strong>Password Reset Email "Subject"</strong></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control form-control-lg" name="passwordResetEmailSubject"
                                                value="{{ config('settings.passwordResetEmailSubject') }}"
                                                placeholder="Enter the email subject for password recovery email (Ex: Password Reset)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $('#toggleSendTestEmail').click(function(event) {
                                    $(this).hide();
                                    $('#sendTestEmailBlock').toggle(500);
                                });
                                $('#sendTestEmailNow').click(function(event) {
                                    let testEmail = $('#testEmail').val();
                                    let token = $("#csrf").val();
                                    
                                    if (testEmail.length) {
                                        $('#sendTestEmailNow').addClass('pointer-none');
                                        $('#testMailSpinner').toggle();
                                        $.ajax({
                                            url: '{{ route('admin.sendTestmail') }}',
                                            type: 'POST',
                                            dataType: 'JSON',
                                            data: {email: testEmail, _token: token},
                                        })
                                        .done(function(data) {
                                            $.jGrowl("Please check your inbox.", {
                                                position: 'bottom-center',
                                                header: 'Mail Sent ✅',
                                                theme: 'bg-success',
                                                life: '5000'
                                            }); 
                                            console.log("success");
                                            $('#sendTestEmailNow').removeClass('pointer-none');
                                            $('#testMailSpinner').toggle();
                                        })
                                        .fail(function(data) {
                                            console.log(data);
                                            $.jGrowl(data.responseJSON.message, {
                                                position: 'bottom-center',
                                                header: 'Wooopsss ⚠️',
                                                theme: 'bg-warning',
                                                life: '999999'
                                            }); 
                                            $('#sendTestEmailNow').removeClass('pointer-none');
                                            $('#testMailSpinner').toggle();
                                        }) 
                                    } else {
                                        $.jGrowl("Please enter an email address in a correct format.", {
                                            position: 'bottom-center',
                                            header: 'Wooopsss ⚠️',
                                            theme: 'bg-warning',
                                            life: '3500'
                                        }); 
                                    }
                                });
                            </script>
                            <div class="tab-pane fade" id="googleAnalyticsSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Google Analytics Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Google
                                            Analytics</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.enableGoogleAnalytics')=="true" )
                                                    checked="checked" @endif name="enableGoogleAnalytics">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Analytics UA ID:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="googleAnalyticsId"
                                            value="{{ config('settings.googleAnalyticsId') }}"
                                            placeholder="UA-00000000-00">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="taxSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Tax Settings
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Enable Tax:</strong></label>
                                    <div class="col-lg-9">
                                        <div class="checkbox checkbox-switchery mt-2">
                                            <label>
                                                <input value="true" type="checkbox" class="switchery-primary"
                                                    @if(config('settings.taxApplicable')=="true" ) checked="checked"
                                                    @endif name="taxApplicable">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><strong>Tax Percentage:</strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-lg" name="taxPercentage"
                                            value="{{ config('settings.taxPercentage') }}"
                                            placeholder="Tax in Percentage">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="customCSS">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Custom CSS
                                </legend>
                                <p>Below code will affect the styling for the Customer Application & the Delivery
                                    Application</p>
                                <div id="css_editor1">{{ config('settings.customCSS') }}</div>
                                <textarea style="display: none" class="form-control" name="customCSS" rows="5"
                                    placeholder="Your CSS code goes here...">{{ config('settings.customCSS') }}</textarea>
                            </div>

                            <div class="tab-pane fade" id="cacheSettings">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Cache Settings
                                </legend>

                                <div class="row">
                                    <p class="col-md-3 col-xs-12"><strong>Application Version: </strong></p>
                                    <span class="col-md-6 col-xs-12">{{ $versionMsg }}</span>
                                </div>
                                <div class="row">
                                    <p class="col-md-3 col-xs-12"><strong>Cache Version: </strong></p>
                                    <span
                                        class="col-md-6 col-xs-12">{{ implode('-', str_split($versionJson->forceCacheClearVersion, 5)) }}</span>
                                </div>
                                <div class="row">
                                    <p class="col-md-3 col-xs-12"><strong>Settings Version: </strong></p>
                                    <span
                                        class="col-md-6 col-xs-12">{{ implode('-', str_split($versionJson->forceNewSettingsVersion, 5)) }}</span>
                                </div>
                                <hr>

                                <h4 class="font-weight-bold">Force Clear Cache</h4>
                                <p>Clicking on this will force clear the
                                    cache on their devices and update the application on the user's device.</p>
                                <a href="javascript:void(0)" data-type="CACHE" data-popup="tooltip"
                                    title="Double Click to Execute" data-placement="right"
                                    class="btn btn-secondary btn-labeled btn-labeled-left" id="forceClearCache"> <b><i
                                            class="icon-arrow-right7"></i></b> Force Clear Cache</a>
                                <hr>

                                <h4 class="font-weight-bold">Force New Settings</h4>
                                <p>Clicking on this will force update new settings for all the users and delivery guys.</p>
                                <a href="javascript:void(0)" data-type="SETTINGS" data-popup="tooltip"
                                    title="Double Click to Execute" data-placement="right"
                                    class="btn btn-secondary btn-labeled btn-labeled-left" id="forceClearSettings">
                                    <b><i class="icon-arrow-right7"></i></b> Force New Settings</a>
                                <hr>
                            </div>

                            <div class="tab-pane fade" id="fixUpdateIssues">
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    Fix Update Issues
                                </legend>
                                <p>After an update, the front-facing app (for customer or delivery) will have
                                    some issues.
                                    <br> The issue may be because of:
                                </p>
                                <ol>
                                    <li> Database error because of incorrect URL</li>
                                    <li> Cross-Origin Error because of non HTTPS URL</li>
                                    <li> Cache issues</li>
                                </ol>
                                <p><strong>Click the below button to fix these issues.</strong></p>
                                @if(Request::secure())
                                <a href="{{ route('admin.fixUpdateIssues') }}" class="btn btn-lg btn-primary">Fix Issues
                                    Now</a>
                                @else
                                <a href="#" onclick="return false;" style="opacity: 0.6; cursor: not-allowed;"
                                    data-popup="tooltip"
                                    title="You need to use https version of URL for admin dashboard to proceed. Example: https://yourdomain.com/public/admin/settings"
                                    data-placement="bottom" class="btn btn-lg btn-primary">Fix Issues Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf">
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-lg">
                            <b><i class="icon-database-insert ml-1"></i></b>
                            Save Settings
                        </button>
                    </div>
                    <input type="hidden" name="window_redirect_hash" value="">
                </form>
            </div>
        </div>
    </div>
</div>

@if($versionMsg != null)
<div class="text-center mx-3" style="color: #9575cd;font-size: 0.8rem">{{ $versionMsg }}</div>
@endif

<script>
    $(function() {
    
        function setSwitchery(switchElement, checkedBool) {
            if((checkedBool && !switchElement.isChecked()) || (!checkedBool && switchElement.isChecked())) {
                switchElement.setPosition(true);
                switchElement.handleOnchange(true);
            }
        }
    
        $('.form-control-uniform').uniform();
    
        // Display color formats
        $(".colorpicker-show-input").spectrum({
          showInput: true
        });
    
        if (Array.prototype.forEach) {
               var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery-primary'));
               elems.forEach(function(html) {
                   var switchery = new Switchery(html, { color: '#2196F3' });
               });
           }
           else {
               var elems = document.querySelectorAll('.switchery-primary');
               for (var i = 0; i < elems.length; i++) {
                   var switchery = new Switchery(elems[i], { color: '#2196F3' });
               }
           }
    
        $('.summernote-editor').summernote({
               height: 200,
               popover: {
                   image: [],
                   link: [],
                   air: []
                 }
        });

        var css_editor = ace.edit("css_editor1");
        css_editor.setTheme("ace/theme/textmate");
        css_editor.getSession().setMode("ace/mode/css");
        css_editor.setShowPrintMargin(false);

        var customCSS1 = $('textarea[name="customCSS"]');
        css_editor.getSession().on("change", function () {
            customCSS1.val(css_editor.getSession().getValue());
        });

        
        $('.payment-gateway-switch').click(function(event) {
            var paymentgateway_id = $(this).val();
            var token = $("#csrf").val();
            console.log(paymentgateway_id);
    
            $.ajax({
                url: '{{ route('admin.togglePaymentGateways') }}',
                type: 'POST',
                dataType: 'json',
                data: {id: paymentgateway_id, _token: token},
            })
            .done(function() {
                $.jGrowl("Payment Gateway Updated", {
                    position: 'bottom-center',
                    header: 'SUCCESS 👌',
                    theme: 'bg-success',
                });
            })
            .fail(function() {
                $.jGrowl("Something went wrong! (Atleast one gateway needs to be active)", {
                    position: 'bottom-center',
                    header: 'Wooopsss ⚠️',
                    theme: 'bg-warning',
                });
                $('#paymentGatewaysData :input[value="'+ paymentgateway_id +'"]');
            })
        });

        $('.threshold-time').numeric({allowThouSep:false, allowDecSep:false, allowMinus: false, maxDigits: 3});
        $('.min-payout').numeric({allowThouSep:false, allowDecSep:true, allowMinus: false, maxDigits: 20});
        /* Navigate with hash */
        var hash = window.location.hash;
        $("[name='window_redirect_hash']").val(hash);
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');
        $('.nav-pills a').click(function (e) {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop();
            window.location.hash = this.hash;
            $("[name='window_redirect_hash']").val(this.hash);
            $('html, body').scrollTop(scrollmem);
        });
        
        $(".timezone-select").val("{{ env("APP_TIMEZONE") }}").change();

        $('#forceClearCache, #forceClearSettings').dblclick(function(event) {
            event.preventDefault();
            let type = $(this).attr("data-type")
            let csrf = $('#csrf').val();

            $('#forceClearCache').addClass('disable-switch');
            $('#forceClearSettings').addClass('disable-switch');

            $.ajax({
                url: '{{ route('admin.forceClear') }}',
                type: 'POST',
                dataType: 'JSON',
                data: {type: type, _token: csrf},
            })
            .done(function(data) {
                $('#cacheVersion').html(data.newVersion.forceCacheClearVersion)
                $('#settingsVersion').html(data.newVersion.forceNewSettingsVersion)

                $('#forceClearCache').removeClass('disable-switch');
                $('#forceClearSettings').removeClass('disable-switch');

                $.jGrowl("Cache/Settings versions has been updated", {
                    position: 'bottom-center',
                    header: 'Operation Successful ✅',
                    theme: 'bg-success',
                    life: '2000'
                }); 
            })
            .fail(function(data) {
                console.log("error");
                $('#forceClearCache').removeClass('disable-switch');
                $('#forceClearSettings').removeClass('disable-switch');

                $.jGrowl("Something went wrong! Please try again later.", {
                    position: 'bottom-center',
                    header: 'Wooopsss ⚠️',
                    theme: 'bg-warning',
                });
            })
        });
    });
</script>
@endsection