package tn.esprit.test.service;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;
import tn.esprit.test.entity.patien;
import tn.esprit.test.repository.patienrepository;

@Service
@AllArgsConstructor
public class patienservice {
    patienrepository patienrepository;
    public patien addpatien(patien p)
    {
        return patienrepository.save(p);

    }
}
