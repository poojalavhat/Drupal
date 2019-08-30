<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\mydata\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use PHPExcel_IOFactory;

/**
 * Class MydataForm.
 *
 * @package Drupal\mydata\Form
 */
class CustomNodeForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'customexcel_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['title'] = array(
            '#type' => 'entity_autocomplete',
            '#target_type' => 'node',
            '#selection_handler' => 'default',
            '#selection_settings' => array(
                'target_bundles' => array('custom_excel'),
            ),
        );
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'save',
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        $node_id = $form_state->getValue('title');

        $node = \Drupal\node\Entity\Node::load($node_id);
        $title = $node->title->value;
        $body = $node->body->value;
        $field_test_1 = $node->field_test_1->value;
        $field_text = $node->field_text->value;
        $data = array($title, $body, $field_test_1, $field_text);
        $rows[] = implode(',', $data);
        $content = implode("\n", $rows);
        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="sample.csv"');

        return $response;
//        
//        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
//        header("Content-Disposition: attachment; filename=my_excel_filename.xls");
//        header('Cache-Control: max-age=0');
//        header("Expires: 0");
//        
//        
//        
//
//        flush();
//        require_once (\Drupal::root() . '/libraries/PHPExcel/Classes/PHPExcel.php');
//        require_once (\Drupal::root() . '/libraries/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');
//        require_once (\Drupal::root() . '/libraries/PHPExcel/Classes/PHPExcel/IOFactory.php');
//        
//
//        
//        $response = new Response();
//        $spreadsheet = new \PHPExcel();
//
//        //Set properties
//        $spreadsheet->getProperties()
//                ->setCreator('Test')
//                ->setLastModifiedBy('Test')
//                ->setTitle("PHPExcel Demo")
//                ->setLastModifiedBy('Test')
//                ->setDescription('A demo to show how to use PHPExcel to manipulate an Excel file')
//                ->setSubject('PHP Excel manipulation')
//                ->setKeywords('excel php office phpexcel lakers')
//                ->setCategory('programming');
//
//        //Add some data
//        $spreadsheet->setActiveSheetIndex(0);
//        $worksheet = $spreadsheet->getActiveSheet();
//
//        //Rename sheet
//        $worksheet->setTitle('My File name');
//
//         /*
//         * TITLE
//         */
//        //Set style Title
//        $styleArrayTitle = array(
//            'font' => array(
//                'bold' => true,
//                'color' => array('rgb' => '161617'),
//                'size' => 12,
//                'name' => 'Verdana'
//        ));
//
//        $worksheet->getCell('A1')->setValue('TEST PHPEXCEL');
//        $worksheet->getStyle('A1')->applyFromArray($styleArrayTitle);
//
//        /*
//         * HEADER
//         */
//        //Set Background        
//        $worksheet->getStyle('A3:E3')
//                ->getFill()
//                ->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
//                ->getStartColor()
//                ->setARGB('085efd');
//
//        //Set style Head
//        $styleArrayHead = array(
//            'font' => array(
//                'bold' => true,
//                'color' => array('rgb' => 'ffffff'),
//        ));
//
//        $worksheet->getCell('A3')->setValue('C1');
//        $worksheet->getCell('B3')->setValue('C2');
//        $worksheet->getCell('C3')->setValue('C3');
//
//        $worksheet->getStyle('A3:E3')->applyFromArray($styleArrayHead);
//
//        for ($i = 4; $i < 10; $i++) {  
//            $worksheet->setCellValue('A' . $i, $i);
//            $worksheet->setCellValue('B' . $i, 'Test C2');
//            $worksheet->setCellValue('C' . $i, 'Test C3');
//        }
//
//
//        
//           $objWriter = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel5');
//        $objWriter->save('php://output');
//
//
//        $content = ob_get_clean();
//        $response->setContent($content);
//
//        return $response;

    }

}
