package tn.esprit.test.controller;

import lombok.AllArgsConstructor;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;
import tn.esprit.test.entity.rendezvous;
import tn.esprit.test.service.rendezvousservice;

@RestController
@AllArgsConstructor
public class rdvcontroller {
    rendezvousservice rendezvousservice;
    @PostMapping("/addrtomandp/{idm}/{idp}")
    public void addRtoMandP(@RequestBody rendezvous R,@PathVariable("idm")Long idm, @PathVariable("idp")Long idp)
    {
        rendezvousservice.addRDVtomandpatien(R,idm,idp);
    }

}
