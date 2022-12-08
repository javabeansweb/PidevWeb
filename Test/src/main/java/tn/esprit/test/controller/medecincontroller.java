package tn.esprit.test.controller;

import lombok.AllArgsConstructor;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;
import tn.esprit.test.entity.medecin;
import tn.esprit.test.service.medecinservice;

@RestController
@AllArgsConstructor
public class medecincontroller {
    medecinservice medecinservice;
    @PostMapping("/addmtoc/{idc}")
    public medecin addmtoc(@RequestBody medecin m, @PathVariable("idc")Long idc){
        return medecinservice.addmedecintoclinique(m,idc);
    }


}
