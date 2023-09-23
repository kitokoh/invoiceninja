{!! $body !!}
@isset($whitelabel)
    @if(!$whitelabel)
        <table cellpadding="0" cellspacing="0" width="100%">
           <tr>
	            <td>
	                <p>
	                    <a href="https://africanovatech.com" target="_blank">
	                        {{ __('texts.ninja_email_footer', ['site' => 'Africa Novatech']) }}
	                    </a>
	                </p>
	            </td>
            </tr>
        </table>
    @endif
@endif