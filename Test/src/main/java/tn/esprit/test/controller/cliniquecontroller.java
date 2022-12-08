package tn.esprit.test.controller;

import lombok.AllArgsConstructor;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;
import tn.esprit.test.entity.clinique;
import tn.esprit.test.service.cliniqueservice;

@RestController
@AllArgsConstructor
public class cliniquecontroller {
    cliniqueservice cliniqueservice;


    @PostMapping("/addc")
    public clinique addclinique(@RequestBody clinique c){
      return   cliniqueservice.addclinique(c);
    }

}
