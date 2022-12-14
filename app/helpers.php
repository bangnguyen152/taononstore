<?php

if (!function_exists('get_svg_icon')) {
    function get_svg_icon($path, $class = null, $svgClass = null)
    {
        if (strpos($path, 'media') === false) {
            $path = theme()->getMediaUrlPath().$path;
        }

        $file_path = public_path($path);

        if (!file_exists($file_path)) {
            return '';
        }

        $svg_content = file_get_contents($file_path);

        if (empty($svg_content)) {
            return '';
        }

        $dom = new DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // add class to svg
        if (!empty($svgClass)) {
            foreach ($dom->getElementsByTagName('svg') as $element) {
                $element->setAttribute('class', $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }
        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }
        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }
        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }
        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }
        $xpath = $dom->getElementsByTagName('path');
        foreach ($xpath as $el) {
            $el->removeAttribute('id');
        }
        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }
        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }
        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }
        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = array('svg-icon');

        if (!empty($class)) {
            $cls = array_merge($cls, explode(' ', $class));
        }

        $asd = explode('/media/', $path);
        if (isset($asd[1])) {
            $path = 'assets/media/'.$asd[1];
        }

        $output = "<!--begin::Svg Icon | path: $path-->\n";
        $output .= '<span class="'.implode(' ', $cls).'">'.$string.'</span>';
        $output .= "\n<!--end::Svg Icon-->";

        return $output;
    }
}

if (!function_exists('theme')) {
    /**
     * Get the instance of Theme class core
     *
     * @return \App\Core\Adapters\Theme|\Illuminate\Contracts\Foundation\Application|mixed
     */
    function theme()
    {
        return app(\App\Core\Adapters\Theme::class);
    }
}

if (!function_exists('util')) {
    /**
     * Get the instance of Util class core
     *
     * @return \App\Core\Adapters\Util|\Illuminate\Contracts\Foundation\Application|mixed
     */
    function util()
    {
        return app(\App\Core\Adapters\Util::class);
    }
}

if (!function_exists('bootstrap')) {
    /**
     * Get the instance of Util class core
     *
     * @return \App\Core\Adapters\Util|\Illuminate\Contracts\Foundation\Application|mixed
     * @throws Throwable
     */
    function bootstrap()
    {
        $demo      = ucwords(theme()->getDemo());
        $bootstrap = "\App\Core\Bootstraps\Bootstrap$demo";

        if (!class_exists($bootstrap)) {
            abort(404, 'Demo has not been set or '.$bootstrap.' file is not found.');
        }

        return app($bootstrap);
    }
}

if (!function_exists('assetCustom')) {
    /**
     * Get the asset path of RTL if this is an RTL request
     *
     * @param $path
     * @param  null  $secure
     *
     * @return string
     */
    function assetCustom($path)
    {
        // Include rtl css file
        if (isRTL()) {
            return asset(theme()->getDemo().'/'.dirname($path).'/'.basename($path, '.css').'.rtl.css');
        }

        // Include dark style css file
        if (theme()->isDarkModeEnabled() && theme()->getCurrentMode() !== 'default') {
            $darkPath = str_replace('.bundle', '.'.theme()->getCurrentMode().'.bundle', $path);
            if (file_exists(public_path(theme()->getDemo().'/'.$darkPath))) {
                return asset(theme()->getDemo().'/'.$darkPath);
            }
        }

        // Include default css file
        return asset(theme()->getDemo().'/'.$path);
    }
}

if (!function_exists('isRTL')) {
    /**
     * Check if the request has RTL param
     *
     * @return bool
     */
    function isRTL()
    {
        return (bool) request()->input('rtl');
    }
}
if (! function_exists('checkSuperAdmin')) {
    function checkSuperAdmin(): bool
    {
        return session()->get('role_id') === 0;
    }
}
if (! function_exists('checkAdmin')) {
    function checkAdmin(): bool
    {
        return session()->get('role_id') === 0 && session()->get('role_id') === 1;
    }
}
if (! function_exists('checkSession')) {
    function checkSession($id): bool
    {
        return session()->get('id')===$id;
    }
}
if (! function_exists('checkLogin')) {
    function checkLogin(): bool
    {
        return session()->has('id');
    }
}

if (! function_exists('FinalPrice')) {
    function FinalPrice($code,$price): float|int
    {
        return $price-$code;
    }
}

if (! function_exists('CheckCategory')) {
    function CheckCategory($id): string
    {
        if ($id ===1){
            return 'Iphone';
        }
        else if ($id===2){
            return 'Ipad';
        }
        else if ($id===3){
            return 'Mac';
        }
        else if ($id===4){
            return 'Watch';
        }
        else if ($id===5){
            return '??m Thanh';
        }
        else if ($id===6){
            return 'Phu?? ki????n';
        }
        return 'Kh??ng co??';
    }
}
if (! function_exists('ProductStatus')) {
    function ProductStatus($id): string
    {
        if ($id ===0){
            return 'Ch??a x???? li??';
        }
        else if ($id===1){
            return '??a?? duy??t';
        }
        else if ($id===2){
            return '??ang giao';
        }
        else if ($id===3){
            return '??a?? giao';
        }
        else if ($id===4){
            return 'Th????t ba??i';
        }
        return 'Kh??ng co??';
    }
}

