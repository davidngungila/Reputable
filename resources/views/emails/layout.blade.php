<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light only">
    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body style="margin:0;padding:0;background-color:#f8fafc;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="width:100%;background-color:#f8fafc;">
    <tr>
        <td align="center" style="padding:32px 12px;">
            <table role="presentation" width="640" cellpadding="0" cellspacing="0" style="width:640px;max-width:100%;background-color:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e2e8f0;box-shadow:0 4px 6px rgba(0,0,0,0.05);">
                <tr>
                    <td style="padding:32px 28px;background:linear-gradient(135deg,#054422 0%,#EA6D24 100%);">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="left" valign="middle" style="width:72px;">
                                    @if(!empty($logo_url))
                                        <img src="{{ $logo_url }}" alt="{{ $brand_name ?? config('app.name') }}" style="display:block;height:44px;width:auto;max-width:100%;">
                                    @endif
                                </td>
                                <td align="left" valign="middle" style="padding-left:16px;">
                                    <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:18px;line-height:22px;font-weight:700;color:#ffffff;">
                                        {{ $brand_name ?? 'Reputable Tours' }}
                                    </div>
                                    @if(!empty($brand_tagline))
                                        <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:12px;line-height:16px;font-weight:600;color:rgba(255,255,255,0.9);letter-spacing:0.5px;text-transform:uppercase;margin-top:6px;">
                                            {{ $brand_tagline }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:24px 28px 8px 28px;">
                        <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:24px;line-height:30px;font-weight:700;color:#1e293b;">
                            {{ $heading ?? ($title ?? 'Notification') }}
                        </div>
                        @if(!empty($subheading))
                            <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;line-height:20px;font-weight:500;color:#64748b;margin-top:8px;">
                                {{ $subheading }}
                            </div>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td style="padding:18px 28px 8px 28px;">
                        @yield('content')
                    </td>
                </tr>

                @if(!empty($footer_note) || !empty($support_email) || !empty($support_phone) || !empty($support_whatsapp) || !empty($website_url))
                    <tr>
                        <td style="padding:24px 28px 26px 28px;border-top:1px solid #e2e8f0;background-color:#f8fafc;">
                            <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#475569;">
                                @if(!empty($footer_note))
                                    <div style="margin-bottom:12px;">{{ $footer_note }}</div>
                                @endif

                                <div>
                                    @if(!empty($support_email))
                                        <span style="font-weight:600;color:#054422;">Email:</span>
                                        <a href="mailto:{{ $support_email }}" style="color:#054422;text-decoration:none;font-weight:500;">{{ $support_email }}</a>
                                    @endif
                                    @if(!empty($support_phone))
                                        <span style="margin:0 12px;color:#94a3b8;">|</span>
                                        <span style="font-weight:600;color:#054422;">Phone:</span>
                                        <span style="color:#475569;font-weight:500;">{{ $support_phone }}</span>
                                    @endif
                                    @if(!empty($support_whatsapp))
                                        <span style="margin:0 12px;color:#94a3b8;">|</span>
                                        <span style="font-weight:600;color:#054422;">WhatsApp:</span>
                                        <span style="color:#475569;font-weight:500;">{{ $support_whatsapp }}</span>
                                    @endif
                                    @if(!empty($website_url))
                                        <span style="margin:0 12px;color:#94a3b8;">|</span>
                                        <span style="font-weight:600;color:#054422;">Website:</span>
                                        <a href="{{ $website_url }}" style="color:#054422;text-decoration:none;font-weight:500;">{{ $website_url }}</a>
                                    @endif
                                </div>

                                <div style="margin-top:16px;padding-top:16px;border-top:1px solid #e2e8f0;color:#64748b;">
                                    <strong>{{ $brand_name ?? 'Reputable Tours' }}</strong> &copy; {{ date('Y') }} - Your Trusted Safari Partner in Tanzania
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            </table>
        </td>
    </tr>
</table>
</body>
</html>
