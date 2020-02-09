<?php

class CommonService {
    private $programRepository;
    private $clazzRepository;
    private $studentsRepository;
    private $templatesRepository;

    public function __construct($programRepository, $clazzRepository, $studentsRepository, $templatesRepository) {
        $this->programRepository = $programRepository;
        $this->clazzRepository = $clazzRepository;
        $this->studentsRepository = $studentsRepository;
        $this->templatesRepository = $templatesRepository;
    }

    public function getProgramById($programId) {
        return $this->programRepository->get($programId);
    }
    public function deleteProgramById($programId) {
        return $this->programRepository->delete($programId);
    }
    public function updateProgramById($programId, $program) {
        return $this->programRepository->update($programId, $program);
    }
    public function createProgram($program) {
        return $this->programRepository->create($program);
    }
    public function getAllPrograms() {
        return $this->programRepository->getAll();
    }

    public function getClazzById($clazzId) {
        return $this->clazzRepository->get($clazzId);
    }
    public function deleteClazzById($clazzId) {
        return $this->clazzRepository->delete($clazzId);
    }
    public function updateClazzById($clazzId, $clazz) {
        return $this->clazzRepository->update($clazzId, $clazz);
    }
    public function createClazz($clazz) {
        return $this->clazzRepository->create($clazz);
    }
    public function getAllClazzes() {
        return $this->clazzRepository->getAll();
    }

    public function getAllStudentsByClazzId($clazzId) {
        return $this->studentsRepository->getAllByClazzId($clazzId);
    }
    public function createManyStudents($students) {
        return $this->studentsRepository->createMany($students);
    }

    public function getTemplateById($templateId) {
        return $this->templatesRepository->get($templateId);
    }
    public function deleteTemplateById($templateId) {
        return $this->templatesRepository->delete($templateId);
    }
    public function updateTemplateById($templateId, $template) {
        return $this->templatesRepository->update($templateId, $template);
    }
    public function createTemplate($template) {
        return $this->templatesRepository->create($template);
    }
    public function getAllTemplates() {
        return $this->templatesRepository->getAll();
    }

}