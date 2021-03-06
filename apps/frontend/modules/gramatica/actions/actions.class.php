<?php

/**
 * gramatica actions.
 *
 * @package    sf2013
 * @subpackage gramatica
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gramaticaActions extends sfActions
{
  public function executeVerGramatica(sfWebRequest $request)
  {
    $this->gramaticas = Doctrine_Core::getTable('Gramatica')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GramaticaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
    $this->getUser()->setFlash('success', sprintf('El objeto ha sido creado correctamente.'));

    $this->form = new GramaticaForm();
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($gramatica = Doctrine_Core::getTable('Gramatica')->find(array($request->getParameter('id'))), sprintf('Object gramatica does not exist (%s).', $request->getParameter('id')));
    $this->form = new GramaticaForm($gramatica);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($gramatica = Doctrine_Core::getTable('Gramatica')->find(array($request->getParameter('id'))), sprintf('Object gramatica does not exist (%s).', $request->getParameter('id')));
    $this->getUser()->setFlash('success', sprintf('El objeto ha sido modificado correctamente.'));
    $this->form = new GramaticaForm($gramatica);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($gramatica = Doctrine_Core::getTable('Gramatica')->find(array($request->getParameter('id'))), sprintf('Object gramatica does not exist (%s).', $request->getParameter('id')));
    $this->getUser()->setFlash('success', sprintf('El objeto ha sido eliminado correctamente.'));
    $gramatica->delete();

    $this->redirect('gramatica/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $gramatica = $form->save();

      $this->redirect('gramatica/edit?id='.$gramatica->getId());
    }
  }
  
  public function executeRealizarGramatica(sfWebRequest $request) {
    $gramaticas = Doctrine::getTable('Gramatica')->getByNameInLevel($request->getParameter('nivel'), $request->getParameter('nombre'));
    $this->gramaticas = $gramaticas;
  }
}
