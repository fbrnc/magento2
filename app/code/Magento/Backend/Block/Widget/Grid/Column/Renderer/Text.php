<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Backend grid item renderer
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Backend\Block\Widget\Grid\Column\Renderer;

class Text extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * Format variables pattern
     *
     * @var string
     */
    protected $_variablePattern = '/\\$([a-z0-9_]+)/i';

    /**
     * Renders grid column
     *
     * @param \Magento\Framework\Object $row
     * @return mixed
     */
    public function _getValue(\Magento\Framework\Object $row)
    {
        $format = $this->getColumn()->getFormat() ? $this->getColumn()->getFormat() : null;
        $defaultValue = $this->getColumn()->getDefault();
        if (is_null($format)) {
            // If no format and it column not filtered specified return data as is.
            $data = parent::_getValue($row);
            $string = is_null($data) ? $defaultValue : $data;
            return $this->escapeHtml($string);
        } elseif (preg_match_all($this->_variablePattern, $format, $matches)) {
            // Parsing of format string
            $formattedString = $format;
            foreach ($matches[0] as $matchIndex => $match) {
                $value = $row->getData($matches[1][$matchIndex]);
                $formattedString = str_replace($match, $value, $formattedString);
            }
            return $formattedString;
        } else {
            return $this->escapeHtml($format);
        }
    }
}
