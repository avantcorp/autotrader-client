<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property int    $axles
 * @property float  $badgeEngineSizeLitres
 * @property int    $batteryCapacityKWH
 * @property int    $batteryChargeTime
 * @property int    $batteryQuickChargeTime
 * @property int    $batteryRangeMiles
 * @property int    $batteryUsableCapacityKWH
 * @property string $bodyType
 * @property float  $bootSpaceSeatsDownLitres
 * @property float  $bootSpaceSeatsUpLitres
 * @property int    $boreMM
 * @property string $cabType
 * @property int    $co2EmissionGPKM
 * @property string $colour
 * @property string $countryOfOrigin
 * @property string $cylinderArrangement
 * @property int    $cylinders
 * @property string $derivative
 * @property string $derivativeId
 * @property int    $doors
 * @property string $drivetrain
 * @property string $driveType
 * @property string $emissionClass
 * @property int    $engineCapacityCC
 * @property string $engineMake
 * @property string $engineNumber
 * @property int    $enginePowerBHP
 * @property int    $enginePowerPS
 * @property float  $engineTorqueLBFT
 * @property int    $engineTorqueNM
 * @property string $firstRegistrationDate
 * @property float  $fuelCapacityLitres
 * @property string $fuelDelivery
 * @property float  $fuelEconomyNEDCCombinedMPG
 * @property float  $fuelEconomyNEDCExtraUrbanMPG
 * @property float  $fuelEconomyNEDCUrbanMPG
 * @property float  $fuelEconomyWLTPCombinedMPG
 * @property string $fuelEconomyWLTPExtraHighMPG
 * @property string $fuelEconomyWLTPHighMPG
 * @property string $fuelEconomyWLTPLowMPG
 * @property string $fuelEconomyWLTPMediumMPG
 * @property string $fuelType
 * @property int    $gears
 * @property string $generation
 * @property int    $grossCombinedWeightKG
 * @property int    $grossTrainWeightKG
 * @property int    $grossVehicleWeightKG
 * @property int    $heightMM
 * @property string $insuranceGroup
 * @property string $insuranceSecurityCode
 * @property int    $lengthMM
 * @property string $make
 * @property int    $minimumKerbWeightKG
 * @property string $model
 * @property int    $odometerReadingMiles
 * @property Oem    $oem
 * @property int    $owners
 * @property string $ownershipCondition
 * @property int    $payloadHeightMM
 * @property int    $payloadLengthMM
 * @property string $payloadVolumeCubicMetres
 * @property int    $payloadWeightKG
 * @property int    $payloadWidthMM
 * @property bool   $rde2Compliant
 * @property string $registration
 * @property string $roofHeightType
 * @property int    $seats
 * @property string $sector
 * @property string $serviceHistory
 * @property bool   $startStop
 * @property int    $strokeMM
 * @property string $style
 * @property string $subStyle
 * @property int    $topSpeedMPH
 * @property string $transmissionType
 * @property string $trim
 * @property string $valveGear
 * @property int    $valves
 * @property string $vehicleType
 * @property int    $vehicleExciseDutyWithoutSupplementGBP
 * @property string $vin
 * @property int    $wheelbaseMM
 * @property string $wheelbaseType
 * @property int    $widthMM
 * @property int    $yearOfManufacture
 * @property float  $zeroToOneHundredKMPHSeconds
 * @property float  $zeroToSixtyMPHSeconds
 */
class Vehicle extends Model
{
    protected $casts = [
        'axles'                                 => 'int',
        'badgeEngineSizeLitres'                 => 'float',
        'batteryCapacityKWH'                    => 'int',
        'batteryChargeTime'                     => 'int',
        'batteryQuickChargeTime'                => 'int',
        'batteryRangeMiles'                     => 'int',
        'batteryUsableCapacityKWH'              => 'int',
        'bootSpaceSeatsDownLitres'              => 'float',
        'bootSpaceSeatsUpLitres'                => 'float',
        'boreMM'                                => 'int',
        'co2EmissionGPKM'                       => 'int',
        'cylinders'                             => 'int',
        'doors'                                 => 'int',
        'engineCapacityCC'                      => 'int',
        'enginePowerBHP'                        => 'int',
        'enginePowerPS'                         => 'int',
        'engineTorqueLBFT'                      => 'float',
        'engineTorqueNM'                        => 'int',
        'fuelCapacityLitres'                    => 'float',
        'fuelEconomyNEDCCombinedMPG'            => 'float',
        'fuelEconomyNEDCExtraUrbanMPG'          => 'float',
        'fuelEconomyNEDCUrbanMPG'               => 'float',
        'fuelEconomyWLTPCombinedMPG'            => 'float',
        'gears'                                 => 'int',
        'grossCombinedWeightKG'                 => 'int',
        'grossTrainWeightKG'                    => 'int',
        'grossVehicleWeightKG'                  => 'int',
        'heightMM'                              => 'int',
        'lengthMM'                              => 'int',
        'minimumKerbWeightKG'                   => 'int',
        'odometerReadingMiles'                  => 'int',
        'oem'                                   => Oem::class,
        'owners'                                => 'int',
        'payloadHeightMM'                       => 'int',
        'payloadLengthMM'                       => 'int',
        'payloadWeightKG'                       => 'int',
        'payloadWidthMM'                        => 'int',
        'seats'                                 => 'int',
        'serviceHistory'                        => 'string',
        'strokeMM'                              => 'int',
        'topSpeedMPH'                           => 'int',
        'valves'                                => 'int',
        'vehicleExciseDutyWithoutSupplementGBP' => 'int',
        'wheelbaseMM'                           => 'int',
        'widthMM'                               => 'int',
        'zeroToOneHundredKMPHSeconds'           => 'float',
        'zeroToSixtyMPHSeconds'                 => 'float',
    ];
}
