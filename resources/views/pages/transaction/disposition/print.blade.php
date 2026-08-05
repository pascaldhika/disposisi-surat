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

        strong{
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

            strong{
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
                <b>{{ $letter->from }}</b><br><br><br><br>

                <strong>Nomor Surat:</strong><br>
                <b>{{ $letter->reference_number }}</b><br><br>

                <strong>Tgl. Surat:</strong><br>
                <b>{{ $letter->formatted_letter_date }}</b>
            </td>

            <td width="50%">
                <strong>Diterima Tgl:</strong><br><br>
                <b>{{ $letter->formatted_received_date }}</b><br><br><br><br>

                <strong>Nomor Agenda:</strong><br>
                <b>{{ $letter->agenda_number }}</b><br><br>

                <strong>Sifat:</strong><br>

                <div style="display: flex; align-items: center;">
                    <div style="white-space: nowrap; margin-left: -8px; position: relative; top: -10px;">
                        <span class="checkbox" style="border: none !important; font-size: 25px;">
                            {{ $data->letter_status === 1 ? '✓' : '' }}
                        </span>
                        <span style="visibility: hidden;">Sangat Segera</span>
                    </div>

                    <div style="white-space: nowrap; margin-left: 48px; position: relative; top: -10px;">
                        <span class="checkbox" style="border: none !important; font-size: 25px;">
                            {{ $data->letter_status === 2 ? '✓' : '' }}
                        </span>
                        <span style="visibility: hidden;">Segera</span>
                    </div>

                    <div style="white-space: nowrap; margin-left: 48px; position: relative; top: -10px;">
                        <span class="checkbox" style="border: none !important; font-size: 25px;">
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
                    <b>{!! nl2br(e(wordwrap($letter->description, 30, "\n", true))) !!}</b>
                </div>
            </td>
        </tr>

        <tr>
            <td width="55%" style="height: 150px;">
                <strong>Diteruskan kepada Sdr. :</strong><br>

                @php
                    $selectedRecipients = old(
                        'recipients',
                        $data->recipient
                            ? json_decode($data->recipient, true)
                            : []
                    );
                @endphp
                <div class="mb-3">
                    <div style="white-space: nowrap; margin-left: -8px; position: relative; top: -10px; margin-bottom: 10px;">
                        <span class="checkbox" style="border: none !important; font-size: 25px;">
                            {{ in_array('Kepala Sub Bagian Tata Usaha', $selectedRecipients) ? '✓' : '' }}
                        </span>
                        <span style="visibility: hidden;">Kepala Sub Bagian Tata Usaha</span>
                    </div>

                    <div style="white-space: nowrap; margin-left: -8px; position: relative; top: -10px; margin-bottom: 10px;">
                        <span class="checkbox" style="border: none !important; font-size: 25px;">
                            {{ in_array('Kepala Seksi Pendataan dan Penetapan', $selectedRecipients) ? '✓' : '' }}
                        </span>
                        <span style="visibility: hidden;">Kepala Seksi Pendataan dan Penetapan</span>
                    </div>

                    <div style="white-space: nowrap; margin-left: -8px; position: relative; top: -10px; margin-bottom: 10px;">
                        <span class="checkbox" style="border: none !important; font-size: 25px;">
                            {{ in_array('Kepala Seksi Pembayaran dan Penagihan', $selectedRecipients) ? '✓' : '' }}
                        </span>
                        <span style="visibility: hidden;">Kepala Seksi Pembayaran dan Penagihan</span>
                    </div>

                    <div style="white-space: nowrap; margin-left: -8px; position: relative; top: -10px; margin-bottom: 10px;">
                        <span class="checkbox" style="border: none !important; font-size: 25px;">
                            {{ in_array('PDPP Samsat', $selectedRecipients) ? '✓' : '' }}
                        </span>
                        @if(in_array('PDPP Samsat', $selectedRecipients))
                        <span style="margin-left: 8px;">PDPP Samsat</span>
                        @endif
                    </div>
                </div>
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
                    <div style="margin-top: 30px;">
                        <b>PONOROGO</b>
                    </div>

                    <img class="signature"
                        src="{{ route('files.show', ['path' => 'attachments/ttd_kupt.png']) }}?v=1"
                        alt="Tanda tangan">

                    <b>Sartono, S.Sos</b><br>
                    <b>Pembina Tingkat I (IV/b)</b><br>
                    <b>NIP. 196808031997031004</b>
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