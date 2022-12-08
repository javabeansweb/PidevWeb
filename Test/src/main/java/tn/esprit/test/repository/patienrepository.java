package tn.esprit.test.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import tn.esprit.test.entity.patien;

public interface patienrepository extends JpaRepository<patien,Long> {
}
