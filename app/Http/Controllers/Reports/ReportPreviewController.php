<?php
/**
 * Africa Novatech (https://africanovatech.com).
 *
 * @link https://africanovatech.com source repository
 *
 * @copyright Copyright (c) 2023. Invoice Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\Http\Controllers\Reports;

use App\Utils\Traits\MakesHash;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Report\ReportPreviewRequest;

class ReportPreviewController extends BaseController
{
    use MakesHash;

    public function __construct()
    {
        parent::__construct();
    }

    public function __invoke(ReportPreviewRequest $request, ?string $hash)
    {

        $report = Cache::get($hash);

        if(!$report)
            return response()->json(['message' => 'Still working.....'], 409);
        
        if($report){
            
            Cache::forget($hash);

            return response()->json($report, 200);
        }


    }
}
