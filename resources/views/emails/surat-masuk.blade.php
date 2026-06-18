<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Surat Masuk</title>
</head>

<body style="margin:0; padding:0; background:#f4f6f9; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">

                <table width="600" style="background:#ffffff; margin-top:40px; border-radius:10px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08);">

                    <!-- HEADER -->
                    <tr>
                        <td style="background:#2c7be5; padding:25px; text-align:center; color:white;">
                            <h2 style="margin:0;">Data Surat Masuk</h2>
                            <p style="margin:5px 0 0 0; font-size:14px;">Notifikasi Data Surat Masuk</p>
                        </td>
                    </tr>

                    <!-- CONTENT -->
                    <tr>
                        <td style="padding:30px;">

                            <p style="color:#555; font-size:14px;">
                            Berikut adalah data Surat Masuk yang telah dikirim melalui sistem:
                            </p>

                            <table width="100%" cellpadding="12" cellspacing="0" style="border-collapse:collapse; font-size:14px;">

                                <tr style="background:#f8f9fa;">
                                    <td width="35%"><b>No Surat</b></td>
                                    <td>{{ $data['reference_number'] }}</td>
                                </tr>

                                <tr style="background:#f8f9fa;">
                                    <td><b>Pengirim</b></td>
                                    <td>{{ $data['from'] }}</td>
                                </tr>

                                <tr style="background:#f8f9fa;">
                                    <td><b>Tgl Surat</b></td>
                                    <td>{{ $data['letter_date'] }}</td>
                                </tr>

                                <tr style="background:#f8f9fa;">
                                    <td><b>Tgl Diterima</b></td>
                                    <td>{{ $data['received_date'] }}</td>
                                </tr>

                                <tr style="background:#f8f9fa;">
                                    <td><b>Ringkasan</b></td>
                                    <td>{{ $data['description'] }}</td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background:#f4f6f9; text-align:center; padding:20px; font-size:12px; color:#888;">

                            <p style="margin:0;">
                            Email ini dikirim otomatis oleh sistem.
                            </p>

                            <p style="margin:5px 0 0 0;">
                            © {{ date('Y') }} {{ config('app.name') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>