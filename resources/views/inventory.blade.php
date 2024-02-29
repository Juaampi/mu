@extends('layouts.app')

@section('content')   

<?php
/*
 * @+================================================================+
 * @� Modulo Ver Vaul v2.0 MUCore v1.0.8 - v1.0.6                    �
 * @� Credits: Thejonyx - https://www.facebook.com/RoboticGames      �
 * @� Credits: Thejonyx - http://roboticgames.web.ve                 �
 * @+================================================================+
 */
$items_categories = [
    0 => "Swords",
    1 => "Axes",
    2 => "Maces",
    3 => "Spears",
    4 => "Bows",
    5 => "Staffs",
    6 => "Shields",
    7 => "Helms",
    8 => "Armors",
    9 => "Pants",
    10 => "Gloves",
    11 => "Boots",
    12 => "Wings",
    13 => "Miscellaneous Items I",
    14 => "Miscellaneous Items II",
    15 => "Scrolls",
];

$items_options_type = [
    0 => "None",
    1 => "Aditional Damage",
    2 => "Aditional Defense",
    3 => "Aditional Rate",
    4 => "Auto HP Recovery",
];

$items_excelent_options_type = [
    0 => "None",
    1 => "Weapon",
    2 => "Set",
    3 => "Wings",
    4 => "Wings II",
];

$items_ancient_groups = [
    0 => "None",

    1 => "Knight",
    3 => "Hyperion",
    5 => "Eplete",
    7 => "Garuda",
    9 => "Kantata",
    11 => "Hyon",
    12 => "Vicious",
    13 => "Apollo",
    15 => "Evis",
    17 => "Heras",
    19 => "Anubis",
    20 => "Isis",
    21 => "Seto",
    23 => "Gaia",
    25 => "Odin",
    27 => "Argos",
    29 => "Gywen",
    30 => "Ahruan",
    31 => "Gaion",
    32 => "Myuren",
    33 => "Agnis",
    34 => "Browii",
    35 => "Chrono",
    36 => "Semeden",
    37 => "Serial",
    38 => "Azir",
    39 => "Gawyn",
    40 => "Lunet",
    41 => "Braya",
];

/*
* @+================================================================+
* @� Modulo Ver Vaul v2.0 MUCore v1.0.8 - v1.0.6                    �
* @� Credits: Thejonyx - https://www.facebook.com/RoboticGames      �
* @� Credits: Thejonyx - http://roboticgames.web.ve                 �
* @+================================================================+
*/
?> 

<?php
/*
 * @+================================================================+
 * @� Modulo Ver Vaul v2.0 MUCore v1.0.8 - v1.0.6                    �
 * @� Credits: Thejonyx - https://www.facebook.com/RoboticGames      �
 * @� Credits: Thejonyx - http://roboticgames.web.ve                 �
 * @+================================================================+
 */
function item_image($theid, $type, $ExclAnci, $lvl = 0)
{
    switch ($ExclAnci) {
        case 1:
            $tnpl = "10";
            break;
        case 2:
            $tnpl = "01";
            break;
        default:
            $tnpl = "00";
    }
    $itype = $type * 16;
    if ($theid > 63) {
        $nxt = dechex($theid);
    } elseif ($theid > 31) {
        $nxt = "F9";
        $theid -= 32;
    } else {
        $nxt = "00";
    }

    if ($itype < 128) {
        $tipaj = "00";
    } else {
        $tipaj = 80;
        $itype -= 128;
    }

    $theid += $itype;
    $itype += $theid;
    $itype = sprintf("%02X", $itype, 00);

    if (
        file_exists("webshop_items/" . $tnpl . $itype . $tipaj . $nxt . ".gif")
    ) {
        $output = "webshop_items/" . $tnpl . $itype . $tipaj . $nxt . ".gif";
    } else {
        $output = "webshop_items/00" . $itype . $tipaj . $nxt . ".gif";
    }

    $i = $lvl + 1;
    while ($i > 0) {
        $i--;
        if (
            file_exists(
                "webshop_items/" .
                    $tnpl .
                    $itype .
                    $tipaj .
                    $nxt .
                    sprintf("%02X", $i, 00) .
                    ".gif"
            )
        ) {
            $output =
                "webshop_items/" .
                $tnpl .
                $itype .
                $tipaj .
                $nxt .
                sprintf("%02X", $i, 00) .
                ".gif";
            $i = 0;
        }
    }
    return $output;
}

function itemslot($whbin, $itemX, $itemY)
{
    global $core_db;
    if (substr($whbin, 0, 2) == "0x") {
        $whbin = substr($whbin, 2);
    }
    $items = str_repeat("0", 120);
    $itemsm = str_repeat("1", 120);
    $i = 0;
    while ($i < 120) {
        $_item = substr($whbin, 32 * $i, 32);
        $type = hexdec(substr($_item, 18, 1));

        $query = DB::table("MUCore_Shop_Items")
            ->select(
                "select top 1 size_x,size_y from MUCore_Shop_Items where i_id='" .
                    hexdec(substr($_item, 0, 2)) .
                    "' and i_type='" .
                    $type .
                    "'"
            )
            ->get();

        $query = $query[0];
        $y = 0;
        while ($y < $query[1]) {
            $y++;
            $x = 0;
            while ($x < $query[0]) {
                $items = substr_replace($items, "1", $i + $x + ($y - 1) * 8, 1);
                $x++;
            }
        }
        $i++;
    }
    $y = 0;
    while ($y < $itemY) {
        $y++;
        $x = 0;
        while ($x < $itemX) {
            $x++;
            $spacerq[$x + 8 * ($y - 1)] = true;
        }
    }
    $walked = 0;
    $i = 0;
    while ($i < 120) {
        if (isset($spacerq[$i])) {
            $itemsm = substr_replace($itemsm, "0", $i - 1, 1);
            $last = $i;
            $walked++;
        }
        if (@$walked == count($spacerq)) {
            $i = 119;
        }
        $i++;
    }
    $useforlength = substr($itemsm, 0, $last);
    $findslotlikethis =
        "^" .
        str_replace("++", "+", str_replace("1", "+[0-1]+", $useforlength));
    $i = 0;
    $nx = 0;
    $ny = 0;
    while ($i < 120) {
        if ($nx == 8) {
            $ny++;
            $nx = 0;
        }
        if (
            eregi(
                $findslotlikethis,
                substr($items, $i, strlen($useforlength))
            ) &&
            $itemX + $nx < 9 &&
            $itemY + $ny < 16
        ) {
            return $i;
        }
        $i++;
        $nx++;
    }
    return 1337;
}

function d2i($icode)
{
    global $core_db;
    if (substr($icode, 0, 2) == "0x") {
        $icode = substr($icode, 2);
    }
    if (
        strlen($icode) != 32 ||      
        $icode == str_repeat("F", 32)
    ) {
        return false;
    }    

    list(
        $refop,
        $luck,
        $skill,
        $iopx6,
        $iopx5,
        $iopx4,
        $iopx3,
        $iopx2,
        $iopx1,
        $ac,
        $item_harmony,
        $tipche,
    ) = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    
    $aa = hexdec(substr($icode, 0, 2)); // Item ID
    $bb = hexdec(substr($icode, 2, 2)); // Item Level/Skill/Option Data
    $cc = hexdec(substr($icode, 4, 2)); // Item Durability
    $ddeeffgg = substr($icode, 6, 8); // Item SKey
    $hh = hexdec(substr($icode, 14, 2)); // Item Excellent Info/ Option
    $ii = hexdec(substr($icode, 16, 2)); // Ancient data
    $jj = hexdec(substr($icode, 18, 1)); // Item Type
    $_ref = hexdec(substr($icode, 19, 1)); // Refinery
    $k = hexdec(substr($icode, 20, 1)); // Harmony type
    $l = hexdec(substr($icode, 21, 1)); // Garmony Value

    
    $itemtype = $jj;
    if ($ii == 5) {
        $ii = 1;
    } elseif ($ii == 9) {
        $ii = 2;
    }
    if ($bb > 127) {
        $skill = 1;
        $bb -= 128;
    }
    $itemlevel = floor($bb / 8);
    $bb -= $itemlevel * 8;
    if ($bb > 3) {
        $luck = 1;
        $bb -= 4;
    }
    if ($hh >= 64) {
        $bb += 4;
        $hh -= 64;
    }
    if ($hh >= 32) {
        $iopx6 = 1;
        $hh -= 32;
        $tipche = 1;
    }
    if ($hh >= 16) {
        $iopx5 = 1;
        $hh -= 16;
        $tipche = 1;
    }
    if ($hh >= 8) {
        $iopx4 = 1;
        $hh -= 8;
        $tipche = 1;
    }
    if ($hh >= 4) {
        $iopx3 = 1;
        $hh -= 4;
        $tipche = 1;
    }
    if ($hh >= 2) {
        $iopx2 = 1;
        $hh -= 2;
        $tipche = 1;
    }
    if ($hh >= 1) {
        $iopx1 = 1;
        $hh -= 1;
        $tipche = 1;
    }
    if ($ii > 0) {
        $tipche = 2;
    }

    

    $fquery = DB::table("MUCore_Shop_Items")->where('i_id', '=', $aa)->where('i_type', '=', $itemtype)->where('i_stick_level', '=', $itemlevel)->get();
    
        
    
    $output["ancient"] = $fquery[0]->id;
    $output["id"] = $aa;
    $output["name"] = $fquery[0]->i_id;
    $output["i_stick_level"] = $fquery[0]->credits;
    $output["i_type"] = $fquery[0]->i_type;
    $output["i_option"] = $fquery[0]->i_option;
    $output["i_exc_option"] = $fquery[0]->i_exc_option;
    $output["level"] = $itemlevel;
    $output["socket"] = $fquery[0]->i_socket_option;
    $output["canRefine"] = $fquery[0]->i_refined_option;
    $output["option"] = $bb;
    $output["exl"] = $iopx6 . $iopx5 . $iopx4 . $iopx3 . $iopx2 . $iopx1;
    $output["luck"] = $luck;
    $output["skill"] = $skill;
    $output["harm"] = $k;
    $output["hval"] = $l;
    $output["harmony"] = $item_harmony;
    $output["dur"] = $cc;
    $output["X"] = $fquery[0]->size_x;
    $output["Y"] = $fquery[0]->size_y;
    $output["set"] = $ii;
    $output["image"] = item_image(
        $fquery[0]->i_id,
        $fquery[0]->i_type,
        $tipche,
        $itemlevel
    );
    $output["sn"] = $ddeeffgg;
    return $output;
}

?> 


 <?php
 echo '
		<div style="margin-top: 20px;
font-size: 24px;
">
		
		Inventory - 1 
		
		</div>
        
 <script type="text/javascript" src="js/overlib.js"></script>
<table width="304" border="0" cellspacing="0" cellpadding="0" style="margin-top: 20px;
">
 <tr>
 <td colspan="3" width="304"><img src="webshop_items/warehouse_top.gif"></td>
 </tr>
 <tr>
 <td><img src="webshop_items/warehouse_left.gif"></td>
<td colspan="0" width="304" height="115" style="background: url(webshop_items/viewinventory_bg.gif);
 background-repeat: no-repeat;
 >
 <td width="256">
 
 <div style=position:relative;
width:256px;
height:480px;
" class="warehouse_block">';
 $i = 0;
 while ($i < 120) {
     $g_items = DB::table("Character")
         ->select(
             \DB::raw("SUBSTRING(Inventory, " . ($i * 16 + 1) . ", 16) as SUB")
         )
         ->where("Name", "=", "LuisADM")
         ->get();
     $i++;
  
     $i_info = $g_items;
   
     if (!$i_info[0]->SUB) {        
         break;
     } elseif ($i_info[0]->SUB == str_repeat("F", 32)) {
         continue;
     }     

     $parts = str_split($i_info[0]->SUB, 8);

    // Inicializa la cadena de salida
    $hex_output = '';

    // Convierte cada parte a hexadecimal y agrégala a la salida
    foreach ($parts as $part) {
        $hex_output .= str_pad(dechex(bindec($part)), 8, '0', STR_PAD_LEFT);
    }                         
     
     $di = d2i($hex_output);     

     if ($di["X"]) {
         if (file_exists($di["image"])) {
             $item_image = '<img src="' . $di["image"] . '">';
         } else {
             $x = 0;
             $cl = 0;
             $iname = explode(" ", $di["name"]);
             $value = "";
             while ($x < count($iname)) {
                 $cl += strlen($iname[$x]);
                 if ($cl >= (2 * $di["X"]) / $di["Y"]) {
                     if ($x != 0) {
                         $value .= "\n";
                     }
                     $cl = 0;
                 }
                 if ($cl != 0 && $x != 0) {
                     $value .= " ";
                 }
                 $value .= $iname[$x];
                 $x++;
             }
             $item_image =
                 '<div style="width:' .
                 $di["X"] * 32 .
                 'px;
height:' .
                 $di["Y"] * 32 .
                 'px;
color:#ffffff;
font-size:11px;
">' .
                 $value .
                 " " .
                 $di["image"] .
                 "</div>";
         }
         $igrek = floor(($i + 43) / 8);
         $hiks = $i - $igrek * 8 + 43;
         $iops = str_split($di["exl"], 1);
         $item_info = '<div align=center style=color:#ffffff;
><span style=color:';
         if ($di["set"] > 0) {
             $item_info .= "#2222ff";
         } elseif ($di["i_type"] > 12) {
             $item_info .= "#E3CA6E";
         } elseif (
             $iops[0] == 1 ||
             $iops[1] == 1 ||
             $iops[2] == 1 ||
             $iops[3] == 1 ||
             $iops[4] == 1 ||
             $iops[5] == 1
         ) {
             $item_info .= "#A9FFB4";
         } elseif ($di["level"] > 3 || $di["option"] > 0) {
             $item_info .= "#9DAEC8";
         } elseif ($di["level"] > 6 || $di["i_type"] > 11) {
             $item_info .= "#E3CA6E";
         } else {
             $item_info .= "#FFFFFF";
         }
         $item_info .= ';
font-weight:bold;
>';
         if ($di["ancient"] > 0 && $di["set"] > 0) {
             foreach (
                 $items_ancient_groups
                 as $ancient_gr_id => $ancient_gr_var
             ) {
                 if ($di["ancient"] == $ancient_gr_id) {
                     $di["name"] =
                         "Ancient Set: " .
                         $ancient_gr_var .
                         "<br>" .
                         $di["name"] .
                         "";
                     break;
                 }
             }
         }
         $item_info .= $di["name"];
         if ($di["level"] > 0 && $di["i_stick_level"] == 0) {
             $item_info .= " +" . $di["level"] . "";
         }
         $item_info .= "</span>";
         $item_info .= "<br><br>Durability: [" . $di["dur"] . "/255]";
         if ($di["harmony"] > 0) {
             $item_info .= "<span style=color:#E01493><br>";
             if ($di["i_type"] == 1) {
                 $item_info .= "Additional Damage +200";
             } elseif ($di["i_type"] == 2) {
                 $item_info .= "Additional Damage +200";
             } elseif ($di["i_type"] == 3) {
                 $item_info .= "Additional Damage +200";
             } elseif ($di["i_type"] == 4) {
                 $item_info .= "Additional Damage +200";
             } elseif ($di["i_type"] == 5) {
                 $item_info .= "Additional Damage +200";
             } elseif ($di["i_type"] == 6) {
                 $item_info .= "Additional Damage +200";
             } elseif ($di["i_type"] == 7) {
                 $item_info .= "SD Auto Recovery";
             } elseif ($di["i_type"] == 8) {
                 $item_info .= "SD Auto Recovery Rate +20";
             } elseif ($di["i_type"] == 9) {
                 $item_info .= "Defense Skill +200";
             } elseif ($di["i_type"] == 10) {
                 $item_info .= "Max HP +200";
             } elseif ($di["i_type"] == 11) {
                 $item_info .= "Max HP +200";
             }
             $item_info .= "<br>";
             if ($di["i_type"] < 7) {
                 $item_info .= "Power Success Rate +10";
             } else {
                 $item_info .= "Defense Success rate +10";
             }
             $item_info .= "<br></span>";
         }
         if ($di["harm"] > 0) {
             $item_info .= "<span style=color:#E3CA6E>";
             if ($di["i_type"] < 5) {
                 if ($di["harm"] == 1) {
                     $item_info .=
                         "<br>Min Attack Power +" . (2 + $di["hval"]) . "";
                 } elseif ($di["harm"] == 2) {
                     $item_info .=
                         "<br>Max Attack Power +" . (3 + $di["hval"]) . "";
                 } elseif ($di["harm"] == 3) {
                     $item_info .=
                         "<br>Strength Requirement -" .
                         (6 + $di["hval"] * 2) .
                         "";
                 } elseif ($di["harm"] == 4) {
                     $item_info .=
                         "<br>Agility Requirement -" .
                         (6 + $di["hval"] * 2) .
                         "";
                 } elseif ($di["harm"] == 5) {
                     $item_info .=
                         "<br>Attack (Max,Min) +" . (1 + $di["hval"]) . "";
                 } elseif ($di["harm"] == 6) {
                     $item_info .=
                         "<br>Critical Damage +" . (2 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 7) {
                     $item_info .=
                         "<br>Skill Power +" . (6 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 8) {
                     $item_info .=
                         "<br>Attack % Rate +" . (6 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 9) {
                     $item_info .= "<br>SD - Rate +" . $di["hval"] . "";
                 } elseif ($di["harm"] == 10) {
                     $item_info .= "<br>SD Ignore Ratee +" . $di["hval"] . "";
                 }
             } elseif ($di["i_type"] == 5) {
                 if ($di["harm"] == 1) {
                     $item_info .= "<br>Magic Power +" . (2 + $di["hval"]) . "";
                 } elseif ($di["harm"] == 2) {
                     $item_info .=
                         "<br>Strength Requirement -" .
                         (6 + $di["hval"] * 2) .
                         "";
                 } elseif ($di["harm"] == 3) {
                     $item_info .=
                         "<br>Agility Requirement -" .
                         (6 + $di["hval"] * 2) .
                         "";
                 } elseif ($di["harm"] == 4) {
                     $item_info .=
                         "<br>Skill Power +" . (6 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 5) {
                     $item_info .=
                         "<br>Critical Damage +" . (2 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 6) {
                     $item_info .= "<br>SD - Rate +" . $di["hval"] . "";
                 } elseif ($di["harm"] == 7) {
                     $item_info .=
                         "<br>Attack % Rate +" . (6 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 8) {
                     $item_info .= "<br>SD Ignore Rate +" . $di["hval"] . "";
                 }
             } else {
                 if ($di["harm"] == 1) {
                     $item_info .=
                         "<br>Defense Power +" . (2 + $di["hval"]) . "";
                 } elseif ($di["harm"] == 2) {
                     $item_info .= "<br>Max AG +" . (3 + $di["hval"]) . "";
                 } elseif ($di["harm"] == 3) {
                     $item_info .= "<br>Max HP +" . (6 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 4) {
                     $item_info .=
                         "<br>HP Auto Rate +" . (6 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 5) {
                     $item_info .=
                         "<br>MP Auto Rate +" . (6 + $di["hval"] * 2) . "";
                 } elseif ($di["harm"] == 6) {
                     $item_info .=
                         "<br>Defense Success Rate +" .
                         (2 + $di["hval"] * 2) .
                         "";
                 } elseif ($di["harm"] == 7) {
                     $item_info .=
                         "<br>Damge Reduction Rate +" .
                         (2 + $di["hval"] * 2) .
                         "";
                 } elseif ($di["harm"] == 8) {
                     $item_info .= "<br>SD Rate +" . (6 + $di["hval"] * 2) . "";
                 }
             }
             $item_info . "<br></span>";
         }
         $item_info .= '<span style=color:#9DAEC8;
>';
         if ($di["skill"] == 1) {
             $item_info .= "<br>This weapon has a special skill";
         }
         if ($di["luck"] == 1) {
             $item_info .=
                 "<br>Luck (Success Rate Of Jewel Of Soul +25%)<br>Luck (Critical Damage Rate +5%)";
         }
         if ($di["i_exc_option"] == 1) {
             if ($iops[0] == 1) {
                 $item_info .= "<br>Excellent Damage Rate +10%";
             }
             if ($iops[1] == 1) {
                 $item_info .= "<br>Increase Damage +Level/20";
             }
             if ($iops[2] == 1) {
                 $item_info .= "<br>Increase Damage +2%";
             }
             if ($iops[3] == 1) {
                 $item_info .= "<br>Increase Attacking(wizardly) speed +7";
             }
             if ($iops[4] == 1) {
                 $item_info .= "<br>Restore Life After Hunt";
             }
             if ($iops[5] == 1) {
                 $item_info .= "<br>Restore Mana After Hunt";
             }
         } elseif ($di["i_exc_option"] == 2) {
             if ($iops[0] == 1) {
                 $item_info .= "<br>Increase MaxHP +4%";
             }
             if ($iops[1] == 1) {
                 $item_info .= "<br>Increase MaxMana +4%";
             }
             if ($iops[2] == 1) {
                 $item_info .= "<br>Damage Decrease +4%";
             }
             if ($iops[3] == 1) {
                 $item_info .= "<br>Reflect Damage +5%";
             }
             if ($iops[4] == 1) {
                 $item_info .= "<br>Defense Success Rate +10%";
             }
             if ($iops[5] == 1) {
                 $item_info .= "<br>Increase Zen Drop Rate +40%";
             }
         } elseif ($di["i_exc_option"] == 3) {
             if ($iops[0] == 1) {
                 $item_info .=
                     "<br>Increase Life +" . (50 + $di["level"] * 5) . "";
             }
             if ($iops[1] == 1) {
                 $item_info .=
                     "<br>Increase Mana +" . (50 + $di["level"] * 5) . "";
             }
             if ($iops[2] == 1) {
                 $item_info .= '<br>Ignore Enemy\'s Defense 3%';
             }
             if ($iops[3] == 1) {
                 $item_info .= "<br>Increase AG";
             }
             if ($iops[4] == 1) {
                 $item_info .= "<br>Increase Attacking(Wizardry)speed +5";
             }
         } elseif ($di["i_exc_option"] == 4) {
             if ($iops[0] == 1) {
                 $item_info .=
                     "<br>Increase Life +" . (50 + $di["level"] * 5) . "";
             }
             if ($iops[1] == 1) {
                 $item_info .=
                     "<br>Increase Mana +" . (50 + $di["level"] * 5) . "";
             }
             if ($iops[2] == 1) {
                 $item_info .= '<br>Ignore enemy\'s defense 3%';
             }
             if ($iops[3] == 1) {
                 $item_info .= "<br>Increase AG";
             }
             if ($iops[4] == 1) {
                 $item_info .= "<br>Increase Attacking(Wizardry)speed +5";
             }
         }
         if ($di["option"] > 0) {
             if ($di["i_option"] == 1) {
                 $item_info .=
                     "<br>Additional Damage +" . 4 * $di["option"] . "";
             } elseif ($di["i_option"] == 2) {
                 $item_info .=
                     "<br>Additional Defense +" . 4 * $di["option"] . "";
             } elseif ($di["i_option"] == 3) {
                 $item_info .=
                     "<br>Additional Defense Rate +" . 5 * $di["option"] . "";
             } elseif ($di["i_option"] == 4) {
                 $item_info .=
                     "<br>Automatic HP Recovery Rate " .
                     5 * $di["option"] .
                     "%";
             }
         }
         if ($di["set"] > 0) {
             $item_info .= "<br>+" . $di["set"] * 5 . " Stamina Increase";
         }
         $item_info .= "</span>";
         $item_info . "</div>";
         if ($i - 1 == 0) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:20px;
top:58px"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 1) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:190px;
top:60px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 2) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:100px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 3) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:100px;
top:60px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 4) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:100px;
top:155px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 5) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:5px;
top:145px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 6) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:195px;
top:145px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 7) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:135px;
top:-10px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 8) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:20px;
top:5px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 9) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:70px;
top:60px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 10) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:70px;
top:155px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } elseif ($i - 1 == 11) {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left:165px;
top:155px;
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         } else {
             echo '<div onmouseover="return overlib(\'' .
                 $item_info .
                 '\');
" onmouseout="return nd();
" style="position: absolute;
 height: ' .
                 $di["Y"] * 32 .
                 'px;
width: ' .
                 $di["X"] * 32 .
                 'px;
left: ' .
                 $hiks * 32 .
                 'px;
top:' .
                 $igrek * 32 .
                 'px;
background-image:url(\'webshop_items/warehouse_item_block.gif\');
"><div style="position: absolute;
 width: 100%;
 height: 100%;
top:0;
left:0">' .
                 $item_image .
                 "</div></div>";
         }
     }
 }
 echo '</div></td>
 <td><img src="webshop_items/warehouse_right.gif"></td>
 </tr>
 <tr>
 <td colspan="3" width="304" height="115" style="background: url(webshop_items/warehouse_bottom.gif);
 background-repeat: no-repeat;
 padding-right: 36px;
 padding-top: 20px;
 color: #f2e0ba;
 font-size: 14px;
" align="right" valign="top">' .
     0 .
     '</td>
 </tr>
</table>
';
 echo "</center>";
 ?>

@endsection