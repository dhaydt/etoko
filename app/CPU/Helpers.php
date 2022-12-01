<?php

namespace App\CPU;

class Helpers
{
    public static function regexUserAgent($ua)
    {
        $ua = is_null($ua) ? $_SERVER['HTTP_USER_AGENT'] : $ua;
        // Enumerate all common platforms, this is usually placed in braces (order is important! First come first serve..)
        $platforms = 'Windows|iPad|iPhone|Macintosh|Android|BlackBerry';

        // All browsers except MSIE/Trident and..
        // NOT for browsers that use this syntax: Version/0.xx Browsername
        $browsers = 'Firefox|Chrome';

        // Specifically for browsers that use this syntax: Version/0.xx Browername
        $browsers_v = 'Safari|Mobile'; // Mobile is mentioned in Android and BlackBerry UA's

        // Fill in your most common engines..
        $engines = 'Gecko|Trident|Webkit|Presto';

        // Regex the crap out of the user agent, making multiple selections and..
        $regex_pat = "/((Mozilla)\/[\d\.]+|(Opera)\/[\d\.]+)\s\(.*?((MSIE)\s([\d\.]+).*?(Windows)|({$platforms})).*?\s.*?({$engines})[\/\s]+[\d\.]+(\;\srv\:([\d\.]+)|.*?).*?(Version[\/\s]([\d\.]+)(.*?({$browsers_v})|$)|(({$browsers})[\/\s]+([\d\.]+))|$).*/i";

        // .. placing them in this order, delimited by |
        $replace_pat = '$7$8|$2$3|$9|${17}${15}$5$3|${18}${13}$6${11}';

        // Run the preg_replace .. and explode on |
        $ua_array = explode('|', preg_replace($regex_pat, $replace_pat, $ua, PREG_PATTERN_ORDER));

        if (count($ua_array) > 1) {
            $return['platform'] = $ua_array[0];  // Windows / iPad / MacOS / BlackBerry
        $return['type'] = $ua_array[1];  // Mozilla / Opera etc.
        $return['renderer'] = $ua_array[2];  // WebKit / Presto / Trident / Gecko etc.
        $return['browser'] = $ua_array[3];  // Chrome / Safari / MSIE / Firefox

        /*
        Not necessary but this will filter out Chromes ridiculously long version
        numbers 31.0.1234.122 becomes 31.0, while a "normal" 3 digit version number
        like 10.2.1 would stay 10.2.1, 11.0 stays 11.0. Non-match stays what it is.
        */

            if (preg_match("/^[\d]+\.[\d]+(?:\.[\d]{0,2}$)?/", $ua_array[4], $matches)) {
                $return['version'] = $matches[0];
            } else {
                $return['version'] = $ua_array[4];
            }
        } else {
            /*
            Unknown browser..
            This could be a deal breaker for you but I use this to actually keep old
            browsers out of my application, users are told to download a compatible
            browser (99% of modern browsers are compatible. You can also ignore my error
            but then there is no guarantee that the application will work and thus
            no need to report debugging data.
             */

            return false;
        }
    }
}
