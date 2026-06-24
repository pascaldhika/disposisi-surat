<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lembar Disposisi</title>

    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        strong,
        b {
            display: none !important;
        }

        .page {
            width: 190mm;
            margin: 10mm auto 0 auto;
            padding-left: 10mm;
            padding-right: 10mm;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-top: 40mm;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header h3, .header h4, .header p {
            margin: 2px;
        }

        .title {
            border: 1px solid #000;
            text-align: center;
            letter-spacing: 5px;
            font-size: 16px;
            padding: 8px;
            display: none !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: none;
            table-layout: fixed;
        }

        td, th {
            border: 1px solid #000;
            padding: 7px;
            vertical-align: top;
            border: none !important;
        }

        .checkbox {
            display: inline-flex;
            width: 16px;
            height: 16px;
            border: 1px solid #000;
            align-items: center;
            justify-content: center;
            vertical-align: middle;
            margin-right: 4px;
            font-family: Arial, sans-serif;
            font-size: 15px;
            font-weight: bold;
            line-height: 1;
        }

        .checked::after {
            content: "✓";
            font-size: 18px;
            font-weight: bold;
        }

        .handwriting {
            font-family: "Comic Sans MS", "Segoe Print", cursive;
            color: #0b2385;
            font-size: 20px;
            transform: rotate(-2deg);
            min-height: 70px;
            padding: 10px;
        }

        .signature {
            max-width: 110px;
            max-height: 70px;
            display: block;
            margin: 5px auto;
        }

        .center {
            text-align: center;
        }

        .print-button {
            margin: 20px 0;
        }

        @media print {
            .print-button {
                display: none;
            }

            strong,
            b {
                display: none !important;
            }
        }
    </style>
</head>
<body>
<div class="page">

    <div class="print-button">
        <button onclick="window.print()">Cetak</button>
    </div>

    <div class="header">
        
    </div><br><br><br>

    <div class="title">LEMBAR DISPOSISI</div>

    <table>
        <tr>
            <td width="50%">
                <strong>Surat Dari:</strong><br><br>
                {{ $letter->from }}<br><br><br><br>

                <strong>Nomor Surat:</strong><br>
                {{ $letter->reference_number }}<br><br>

                <strong>Tgl. Surat:</strong><br>
                {{ $letter->formatted_letter_date }}
            </td>

            <td width="50%">
                <strong>Diterima Tgl:</strong><br><br>
                {{ $letter->formatted_received_date }}<br><br><br><br>

                <strong>Nomor Agenda:</strong><br>
                {{ $letter->agenda_number }}<br><br>

                <strong>Sifat:</strong><br>

                <div style="display: flex; align-items: center; margin-top: 6px;">
                    <div style="white-space: nowrap; margin-left: -10px; position: relative; top: -10px;">
                        <span class="checkbox" style="border: none !important;">
                            {{ $data->letter_status === 1 ? '✓' : '' }}
                        </span>
                        <span style="visibility: hidden;">Sangat Segera</span>
                    </div>

                    <div style="white-space: nowrap; margin-left: 50px; position: relative; top: -10px;">
                        <span class="checkbox" style="border: none !important;">
                            {{ $data->letter_status === 2 ? '✓' : '' }}
                        </span>
                        <span style="visibility: hidden;">Segera</span>
                    </div>

                    <div style="white-space: nowrap; margin-left: 50px; position: relative; top: -10px;">
                        <span class="checkbox" style="border: none !important;">
                            {{ $data->letter_status === 3 ? '✓' : '' }}
                        </span>
                        <span style="visibility: hidden;">Rahasia</span>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="3" style="height: 150px;">
                <strong>Hal:</strong><br><br>

                <div style="padding-left: 50px;">
                    {!! nl2br(e(wordwrap($letter->description, 30, "\n", true))) !!}
                </div>
            </td>
        </tr>

        <tr>
            <td width="55%" style="height: 150px;">
                
            </td>

            <td colspan="2">
                
            </td>
        </tr>

        <tr>
            <td colspan="3" style="height: 300px;">
                <strong>Catatan:</strong><br><br>

                <div class="handwriting">
                    {!! nl2br(e($data->content)) !!}
                </div>

                <div style="float:right; width: 290px; text-align:center;">
                    <strong>Kepala UPT PPD</strong><br>
                    <div style="margin-top: 40px;">
                        PONOROGO
                    </div>

                    <img class="signature"
                        src="{{ asset('storage/attachments/ttd_kupt.png') }}"
                        alt="Tanda tangan">

                    Sartono, S.Sos<br>
                    Pembina (IV/a)<br>
                    NIP. 196808031997031004
                </div>
            </td>
        </tr>
    </table>
</div>

<script>
    window.onload = function () {
        window.print();
    };

    window.onafterprint = function () {
        window.history.back();
    };
</script>

</body>
</html>