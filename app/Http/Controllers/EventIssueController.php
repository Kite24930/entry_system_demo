<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Illuminate\Http\Request;

class EventIssueController extends Controller
{
    public function show($event_id) {
        $event = Event::find($event_id);
        $data = json_encode([
            'event' => $event,
        ]);
        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $data,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Medium,
            size: 500,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            logoPath: public_path('storage/icon.png'),
            logoResizeToWidth: 300,
            logoPunchoutBackground: false,
            labelText: 'Scan me',
            labelFont: new OpenSans(16),
            labelAlignment: LabelAlignment::Center,
        );
        $result = $builder->build();
        $qr_code = $result->getDataUri();
        $data = [
            'event' => $event,
            'qr_code' => $qr_code,
        ];
        return view('event.issue.show', $data);
    }
}
