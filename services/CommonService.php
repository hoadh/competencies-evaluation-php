<?php

class CommonService {
    private $programRepository;
    private $clazzRepository;

    public function __construct($programRepository, $clazzRepository) {
        $this->programRepository = $programRepository;
        $this->clazzRepository = $clazzRepository;
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
}