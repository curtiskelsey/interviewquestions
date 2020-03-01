<?php


namespace AxisCare\Option;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;
use AxisCare\Enumerable\MimeType;
use AxisCare\Model\Statement;
use AxisCare\View\Renderer\StatementRenderer;
use AxisCare\View\Renderer\RenderHtmlInterface;
use AxisCare\View\Renderer\RenderTextInterface;

/**
 * Class AxisCareOptions
 * @package AxisCare
 */
class AxisCareOptions implements ArraySerializableInterface
{
    use ArraySerializableTrait;

    private $movieClassifications = [
        [
            'id' => 0,
            'name' => 'Regular',
            'pointsProfile' => 1,
            'rateProfile' => 1,
        ],
        [
            'id' => 1,
            'name' => 'New Release',
            'pointsProfile' => 2,
            'rateProfile' => 2,
        ],
        [
            'id' => 1,
            'name' => 'Childrens',
            'pointsProfile' => 2,
            'rateProfile' => 3,
        ]
    ];

    private $pointsProfiles = [
        [
            'id' => 1,
            'basePoints' => 1,
            'bonusPoints' => 0,
            'bonusPointsThreshold' => 1,
        ],
        [
            'id' => 2,
            'basePoints' => 1,
            'bonusPoints' => 1,
            'bonusPointsThreshold' => 1,
        ],
    ];

    private $rateProfiles = [
        [
            'id' => 1,
            'baseRate' => 2,
            'rate' => 1.5,
            'rateThreshold' => 2,
        ],
        [
            'id' => 2,
            'baseRate' => 0,
            'rate' => 3,
            'rateThreshold' => 0,
        ],
        [
            'id' => 3,
            'baseRate' => 1.5,
            'rate' => 1.5,
            'rateThreshold' => 3,
        ],
    ];

    private $priceCodes = [
        [
            'id' => 0,
            'name' => 'Regular',
            'priceMultiplier' => 1.5,
            'daysRentedThreshold' => 2,
            'flatRate' => 2,
        ],
        [
            'id' => 1,
            'name' => 'New Release',
            'priceMultiplier' => 3,
            'daysRentedThreshold' => 0,
            'flatRate' => 0,
            'bonusFrequentRenterPoints' => 1,
            'bonusFrequentRenterPointsThreshold' => 1,
        ],
        [
            'id' => 2,
            'name' => 'Childrens',
            'priceMultiplier' => 1.5,
            'daysRentedThreshold' => 3,
            'flatRate' => 1.5,
        ],
    ];

    /**
     * @var string[]
     */
    private $supportedMimeTypes = [
        MimeType::WILDCARD => RenderHtmlInterface::class,
        MimeType::TEXT_HTML => RenderHtmlInterface::class,
        MimeType::TEXT_PLAIN => RenderTextInterface::class,
    ];

    private $viewRendererPlugins = [
        Statement::class => StatementRenderer::class,
    ];

    public static function create(): self
    {
        $configPath = __DIR__ . '/../../config/local.php';

        if (file_exists($configPath)) {
            /** @noinspection PhpIncludeInspection */
            $config = include $configPath;

            return new self($config);
        }

        return new self([]);
    }

    public function __construct(array $options)
    {
        $this->fromArray($options);
    }

    /**
     * @codeCoverageIgnore
     * @return string[]
     */
    public function getSupportedMimeTypes(): array
    {
        return $this->supportedMimeTypes;
    }

    /**
     * @codeCoverageIgnore
     * @return string[]
     */
    public function getViewRendererPlugins(): array
    {
        return $this->viewRendererPlugins;
    }

    /**
     * @return array
     */
    public function getPriceCodes(): array
    {
        return $this->priceCodes;
    }

    /**
     * @param array $priceCodes
     * @return $this
     */
    public function setPriceCodes(array $priceCodes): self
    {
        $this->priceCodes = $priceCodes;
        return $this;
    }

    /**
     * @return array
     */
    public function getMovieClassifications(): array
    {
        return $this->movieClassifications;
    }

    /**
     * @param array $movieClassifications
     * @return $this
     */
    public function setMovieClassifications(array $movieClassifications): self
    {
        $this->movieClassifications = $movieClassifications;
        return $this;
    }

    /**
     * @return array
     */
    public function getPointsProfiles(): array
    {
        return $this->pointsProfiles;
    }

    /**
     * @param array $pointsProfiles
     * @return $this
     */
    public function setPointsProfiles(array $pointsProfiles): self
    {
        $this->pointsProfiles = $pointsProfiles;
        return $this;
    }

    /**
     * @return array
     */
    public function getRateProfiles(): array
    {
        return $this->rateProfiles;
    }

    /**
     * @param array $rateProfiles
     * @return $this
     */
    public function setRateProfiles(array $rateProfiles): self
    {
        $this->rateProfiles = $rateProfiles;
        return $this;
    }
}
