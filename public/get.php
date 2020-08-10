<?php

function SYlogo($code,$xy=3) {

    // Turn hex into dec
    $code        = urlencode(bin2hex($code));
    $color[0]    = ''; $color[1]='#000000'; $color[2]='#8c8a8d'; $color[3]='#ffffff'; $color[4]='#fe0000'; $color[5]='#ff8a00'; $color[6]='#ffff00'; $color[7]='#8cff01'; $color[8]='#00ff00'; $color[9]='#01ff8d'; $color['a']='#00ffff'; $color['b']='#008aff'; $color['c']='#0000fe'; $color['d']='#8c00ff'; $color['e']='#ff00fe'; $color['f']='#ff008c'; 

    // Set the default zero position.
    $i        = 0; 
    $ii        = 0;

    // Create the table
    $it         = '<table style=\'width: '.(8*$xy).'px;height:'.(8*$xy).'px\' border=0 cellpadding=0 cellspacing=0><tr>';
    
    // Start the logo drawing cycle for each color slot
    while ($i<64) {

        // Get the slot color number
        $place    = $code{$i};

        // Increase the slot
        $i++;$ii++;
        
        // Get the color of the slot

        $add    = $color[$place];

        // Create the slot with its color

        $it     .= '<td class=\'guildlogo\' style=\'background-color: '.$add.';\' width=\''.$xy.'\' height=\''.$xy.'\'></td>';

        // In case we have a new line
        if ($ii==8) { 
            $it .=  '</tr>'; 
            if ($ii != 64) $it .='<tr>';
            $ii =0; 
        }
    }

    // Finish the table off
    $it .= '</table>';

    // What do we output
    return $it;
}
?>