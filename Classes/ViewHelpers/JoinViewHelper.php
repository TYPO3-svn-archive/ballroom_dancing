<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Martin Kutschker <masi@typo3.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 *
 * = Examples =
 *
 * <code title="Basic usage">
 * <bd:join each="{0: 'apple', 1: 'banana'}" by=" and " />
 * </code>
 *
 * <code title="Standard usage">
 * <bd:join each="{0: 'apple', 1: 'banana'}" as="fruit" by=" and " >{fruit}</bd:join>
 * </code>
 *
 * <code title="Extended usage">
 * <bd:join each="{0: 'apple', 1: 'banana'}" as="fruit">
 *  <bd:item>{fruit}</bd:item>
 *  <bd:by> and </bd:by>
 * </bd:join>
 *
 */
class Tx_BallroomDancing_ViewHelpers_JoinViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper implements Tx_Fluid_Core_ViewHelper_Facets_ChildNodeAccessInterface {

	/**
	 * An array of Tx_Fluid_Core_Parser_SyntaxTree_AbstractNode
	 * @var array
	 */
	protected $childNodes = array();

	/**
	 * @var Tx_Fluid_Core_Rendering_RenderingContext
	 */
	protected $renderingContext;

	/**
	 * Setter for ChildNodes - as defined in ChildNodeAccessInterface
	 *
	 * @param array $childNodes Child nodes of this syntax tree node
	 * @return void
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function setChildNodes(array $childNodes) {
		$this->childNodes = $childNodes;
	}

	/**
	 * Sets the rendering context which needs to be passed on to child nodes
	 *
	 * @param Tx_Fluid_Core_Rendering_RenderingContext $renderingContext the renderingcontext to use
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function setRenderingContext(Tx_Fluid_Core_Rendering_RenderingContext $renderingContext) {
		$this->renderingContext = $renderingContext;
	}

	/**
	 * @param array $each The array or SplObjectStorage to iterated over
	 * @param string $as The name of the iteration variable
	 * @param string $by The string used to concatenate the array elements
	 * @return string Rendered result
	 */
	public function render($each, $as='', $by='') {
		$itemNode = null;

		foreach ($this->childNodes as $childNode) {
			if ($childNode instanceof Tx_Fluid_Core_Parser_SyntaxTree_ViewHelperNode) {
				switch ($childNode->getViewHelperClassName()) {
					case 'Tx_BallroomDancing_ViewHelpers_ByViewHelper':
						$childNode->setRenderingContext($this->renderingContext);
						$by = $childNode->evaluate();
						break;
					case 'Tx_BallroomDancing_ViewHelpers_ItemViewHelper':
						$itemNode = $childNode;
						break;
				}
			}
		}

		// if there are no child nodes, simply implode (join) the array
		if (count($this->childNodes) == 0) {
			return implode($each, $by);
		}

		$output = '';
		$counter = 0;
		foreach ($each as $item) {
			if ($counter) {
				$output .= $by;
			}

			$this->templateVariableContainer->add($as, $item);
			if ($itemNode) {
				$itemNode->setRenderingContext($this->renderingContext);
				$output .= $itemNode->evaluate();
			} else {
				$output .= $this->renderChildren();
			}
			$this->templateVariableContainer->remove($as);
			$counter++;
		}
		return $output;
	}

}

?>