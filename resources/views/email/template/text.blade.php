{!! $text_body !!}
@isset($whitelabel)
@if(!$whitelabel)
        
{{ ctrans('texts.ninja_email_footer', ['site' => 'https://africanovatech.com']) }}
@endif
@endisset
